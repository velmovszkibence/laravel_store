<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use App\Models\Category;
use App\Mail\OrderUnderProcess;
use Exception;
use Illuminate\Support\Facades\Mail;
use Session;
use Stripe\Stripe;
use Stripe\Charge;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $parents = Category::whereNull('parent_id')->get();
        $subcategories = Category::whereNotNull('parent_id')->orderBy('category_name', 'asc')->get();
        $featured = ProductResource::collection(Product::inRandomOrder()->where('discount', '>', '0')->limit(6)->get());

        if($request->q) {
            $input = $this->validate($request, [
                'q' => 'min:3|max:30|string'
            ]);

            $products = ProductResource::collection(Product::where('products.name', 'like', '%'. $input['q'] . '%')
            ->orWhere('products.description', 'like', '%'. $input['q'] . '%')
            ->orderBy('products.name', 'desc')->paginate(20));
        } else if($request->category) {
            $input = $this->validate($request, [
                'category' => 'required|numeric|min:1|max:100'
            ]);
            $products = Product::where('category_id', '=', $input['category'])->paginate(20);
        } else {
            $products = ProductResource::collection(Product::where('is_active', 1)->orderBy('name', 'desc')->paginate(20));
        }

        return view('index', ['products' => $products, 'parents' => $parents, 'subcategories' => $subcategories, 'featured' => $featured]);

    }

    public function show($id)
    {
      $product = Product::find($id);
      if($product) {
        return view('show',['product' => $product,]);
      }
      return redirect()->route('product.index')->with('error-msg', 'Something went wrong');
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::find($id);
        if($product->outOfStock()) {
            return redirect()->route('product.index')->with('error-msg', 'This product is not available');
        }
        $prevCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($prevCart);
        $cart->addItem($product, $product->id);
        $request->session()->put('cart', $cart);

        return redirect()->route('product.index')->with('success', '1 Item added to your cart');
    }

    public function increaseNumberOfItems($id)
    {
        $prevCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($prevCart);
        $cart->increaseByOne($id);
        Session::put('cart', $cart);

        return redirect()->route('product.shoppingcart');
    }

    public function decreaseNumberOfItems($id)
    {
        $prevCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($prevCart);
        $cart->decreaseByOne($id);

        if(count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
            return redirect()->route('product.index');
        }
        return redirect()->route('product.shoppingcart');
    }

    public function deleteItemFromCart($id)
    {
        $prevCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($prevCart);
        $cart->deleteFromCart($id);

        if(count($cart->items) > 0) {
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
            return redirect()->route('product.index');
        }
        return redirect()->route('product.shoppingcart');
    }

    public function getShoppingCart()
    {
        if(!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $prevCart = Session::get('cart');
        $cart = new Cart($prevCart);


        return view('shop.shopping-cart', ['products' => $cart->items, 'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout()
    {
        if(!Session::has('cart')) {
            return view('shop.shopping-cart');
        }

        $prevCart = Session::get('cart');
        $cart = new Cart($prevCart);
        $total = $cart->totalPrice;

        if(Auth::id()) {
            $user = User::find(Auth::id());
            return view('shop.checkout', ['total' => $total, 'user' => $user]);
        }

        return view('shop.checkout', ['total' => $total]);

    }

    public function postCheckout(Request $request)
    {
        if(!Session::has('cart')) {
            return view('shop.shopping-cart');
        }
        $prevCart = Session::get('cart');
        $cart = new Cart($prevCart);

        // Charge with stripe and save order to db
        Stripe::setApiKey('sk_test_51HHWrwKg112ZJOxi1vzTpYho8tHcffJotwlTGz0RYxu55fpD6bxPCdwq7uTJs0cOlqp913sl7Nq47UpM66M5SWAM00nTsiIIF3');

        $input = $this->validate($request, [
            'name' => 'required|min:5|max:30|string',
            'address' => 'required|min:5|max:30|string',
            'city' => 'required|min:3|max:30|string',
            'zipcode' => 'required|numeric|digits_between:1,5',
            'country' => 'required|min:2|max:30|string',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits_between:9,30'
        ]);

        try {
            $charge = Charge::create([
                'amount' => $cart->totalPrice * 100,
                'currency' => 'usd',
                'description' => 'Example charge',
                'source' => $request['stripeToken'],
            ]);

            $order = Order::create([
                'user_id' => Auth::id() || null,
                'name' => $input['name'],
                'address' => $input['address'],
                'city' => $input['city'],
                'zipcode' => $input['zipcode'],
                'country' => $input['country'],
                'email' => $input['email'],
                'phone' => $input['phone'],
                'cart' => serialize($cart),
                'payment_id' => $charge->id
            ]);

            !Auth::user() ? $order->save() : Auth::user()->orders()->save($order);

        } catch(Exception $e) {
            return redirect()->route('checkout')->with('error', $e->getMessage());
        }

        Mail::to($input['email'])->send(new OrderUnderProcess($input['name'], $cart));

        // Count how many times product sold
        while(count($cart->items) != 0) {
            $soldqty = array_values($cart->items)[0]['quantity'];
            $soldid = array_values($cart->items)[0]['item']->id;
            $product = Product::find($soldid);
            $product->sold = $product->sold + $soldqty;
            $product->save();

            \array_splice($cart->items, 0, 1);
        }

        Session::forget('cart');
        return redirect()->route('product.index')->with('success', 'Your order created successfully. Thank you for choosing us!');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index() {}

    public function getAccountPage() {
        return view('admin.account.index');
    }

    public function updateAdmin(Request $request) {
        $email = User::where('email', $request->email)->exists();
        if($email == true && $request->newpassword == $request->confirmpassword) {
            User::where('email', $request->email)->update(['password' => bcrypt($request->newpassword)]);
            return redirect()->back()->with('update-success', 'Password successfully updated!');
        }
        return redirect()->back()->with('update-fail', 'Wrong email address or password!');
    }

    public function getDashboard() {
        $products = Product::where('sold', '>', 0)->orderBy('sold', 'desc')->limit(5)->get();
        if(count($products) < 5) {
            $products = Product::inRandomOrder()->limit(5)->get();
        }
        return view('admin.dashboard', ['products' => $products]);
    }

    public function getHelpPage() {
        return view('admin.help.index');
    }

    public function getOrderPage(Request $request) {
        if($request->q) {
            $orders = Order::query()
            ->where('name', 'like', '%' . $request->q . '%')
            ->orWhere('payment_id', 'like', '%' . $request->q . '%')
            ->orderBy('id', 'desc')->paginate(5);
            $count = $orders->count();
        } else {
            $orders = Order::orderBy('created_at', 'desc')->paginate(5);
            $count = $orders->count();
        }
        return view('admin.order.index', ['orders' => $orders, 'count' => $count]);
    }

    public function updateOrderStatus(Request $request) {
        $order = Order::find($request->id);
        $order->update(['status' => $request->status]);
        return redirect()->back()->with('success_message', 'Order successfully updated');
    }

    public function showOrder($id) {
        $order = Order::find($id);
        $cartItems = unserialize($order->cart);
        return view('admin.order.show', ['order' => $order, 'cartItems' => $cartItems]);
    }

    public function getProductPage(Request $request) {
        if($request->q) {
            $products = Product::query()
            ->where('name', 'like', '%' . $request->q . '%')
            ->orWhere('description', 'like', '%' . $request->q . '%')
            ->orderBy('name', 'desc')->paginate(5);
            $count = $products->count();
        } else {
            $products = Product::orderBy('created_at', 'desc')->paginate(5);
            $count = $products->count();
        }
        return view('admin.product.index', ['products' => $products, 'count' => $count]);
    }

    public function storeProduct(Request $request) {
        $input = $request->all();
        if($file = $request->file('product-image')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $input['image'] = $name;
        }

        Product::create($input);

        return redirect()->back()->with('success_message', 'Product successfully created!');
    }

    public function getEditProductPage($id) {
        $product = Product::find($id);
        return view('admin.product.edit', ['product' => $product]);
    }

    public function updateProduct(Request $request, $id) {
        $input = array_filter($request->all());
        // if(empty($request->input('category_id'))) {
        //     $input = $request->except('category_id');
        // }
        if($file = $request->file('product-image')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $input['image'] = $name;

            // Product::findOrFail($id)->image()->delete();
        }

        Product::find($id)->update($input);
        return redirect()->to('/admin/product')->with('success_message', 'Product successfully updated!');
    }

    public function activateProduct(Request $request) {
        $product = Product::find($request->id);
        $success = 'Product successfully activated!';
        if($request->is_active == 0) {
            $success = 'Product successfully deactivated!';
        }
        $product->update(['is_active' => $request->is_active]);
        return redirect()->back()->with('success_message', $success);
    }

    public function destroyProduct($id)
    {
        $product = Product::find($id);
        $img_path = str_replace('\\', '/', public_path().'/'.$product->image);

        if(File::exists($img_path)) {
            File::delete($img_path);
        }

        $product->delete();
        return redirect()->back()->with('success_message', 'Product successfully deleted!');

    }

    public function getStatisticPage() {
        return view('admin.statistic.index');
    }

    public function getStockPage() {
        return view('admin.stock.index');
    }

}
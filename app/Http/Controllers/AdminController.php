<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Image;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index() {}

    public function getAccountPage()
    {
        return view('admin.account.index');
    }

    public function updateAdmin(Request $request)
    {
        $email = User::where('email', $request->email)->exists();
        if($email == true && $request->newpassword == $request->confirmpassword) {
            User::where('email', $request->email)->update(['password' => bcrypt($request->newpassword)]);
            return redirect()->back()->with('update-success', 'Password successfully updated!');
        }
        return redirect()->back()->with('update-fail', 'Wrong email address or password!');
    }

    public function getDashboard()
    {
        $products = Product::where('sold', '>', 0)->orderBy('sold', 'desc')->limit(5)->get();
        if(count($products) < 5) {
            $products = Product::inRandomOrder()->limit(5)->get();
        }
        return view('admin.dashboard', ['products' => $products]);
    }

    public function getHelpPage()
    {
        return view('admin.help.index');
    }

    public function getOrderPage(Request $request)
    {
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

    public function updateOrderStatus(Request $request)
    {
        $order = Order::find($request->id);
        $order->update(['status' => $request->status]);
        return redirect()->back()->with('success_message', 'Order successfully updated');
    }

    public function showOrder($id)
    {
        $order = Order::find($id);
        $cartItems = unserialize($order->cart);
        return view('admin.order.show', ['order' => $order, 'cartItems' => $cartItems]);
    }

    public function getProductPage(Request $request)
    {
        if($request->q) {
            $input = $this->validate($request, [
                'q' => 'required|min:3|max:30|string'
            ]);
            $products = Product::query()
            ->where('name', 'like', '%' . $input['q'] . '%')
            ->orWhere('description', 'like', '%' . $input['q'] . '%')
            ->orderBy('name', 'desc')->paginate(5);
            if(count($products) == 0) {
                return redirect()->to('admin/product')->with('not-found', 'No results found');
            }
        } else {
            $parents = Category::whereNull('parent_id')->get();
            $subcategories = Category::whereNotNull('parent_id')->orderBy('category_name', 'asc')->get();
            $products = Product::orderBy('created_at', 'desc')->paginate(5);
        }

        if($parents && $subcategories && $products) {

            return view('admin.product.index', ['products' => $products, 'parents' => $parents, 'subcategories' => $subcategories]);
        } else {
            return redirect()->to('admin/product')->with('not-found', 'Something went wrong');
        }
    }

    public function storeProduct(Request $request)
    {
        $input = $this->validate($request, [
            'name' => 'required|min:5|string|unique:products,name',
            'price' => 'required|min:1|between:1,9999.99',
            'discount' => 'required|integer',
            'stock' => 'required|integer',
            'category' => 'integer',
            'description' => 'required|string|min:10|max:2000',
            'images' => 'array|nullable'
        ]);

        $product = Product::create([
            'name' => $input['name'],
            'price' => $input['price'],
            'stock' => $input['stock'],
            'category_id' => $input['category'],
            'description' => $input['description'],
            'discount' => $input['discount']
        ]);

        $product->save();

        if($request->images) {
            foreach($request->images as $requestimg) {
                $name = $requestimg->getClientOriginalName();
                $requestimg->move('images', $name);
                $image = new Image;
                $image->image = $name;
                $image->product_id = $product->id;
                $image->save();
            }
        }
        return redirect()->back()->with('success_message', 'Product successfully created!');
    }

    public function getEditProductPage($id)
    {
        $product = Product::find($id);
        $parents = Category::whereNull('parent_id')->get();
        $subcategories = Category::whereNotNull('parent_id')->orderBy('category_name', 'asc')->get();
        if($product && $parents && $subcategories) {
            return view('admin.product.edit', ['product' => $product, 'parents' => $parents, 'subcategories' => $subcategories]);
        } else {
            return redirect()->to('admin/product')->with('not-found', 'Something went wrong');
        }
    }

    public function updateProduct(Request $request, $id)
    {
        // strlen let 0 value pass
        $req = $request->except('product_image');
        $input = array_filter($req, 'strlen');

        if($request->hasFile('product_image')) {
            foreach ($request->product_image as $key => $file) {
                if($key == 0) {
                    $image = Image::where('product_id', '=', $id)->orderBy('id', 'ASC')->first();
                } else if($key == 1) {
                    $image = Image::where('product_id', '=', $id)->orderBy('id', 'ASC')->skip(1)->first();
                } else if($key == 2) {
                    $image = Image::where('product_id', '=', $id)->orderBy('id', 'ASC')->skip(2)->first();
                }
                if(empty($image)) {
                    $image = new Image;
                    $image->product_id = $id;
                }
                $name = $file->getClientOriginalName();
                $file->move('images', $name);
                $image->image = $name;
                $image->save();
            }
        }

        $product = Product::find($id);
        if($input['category']) {
            $product->category_id = $input['category'];
            $product->save();
        }
        Product::find($id)->update($input);

        return redirect()->to('admin/product')->with('success_message', 'Product successfully updated!');
    }

    public function activateProduct(Request $request)
    {
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
        foreach ($product->images as $image) {
            if($image) {
                $image_path = public_path() .  '\images\\'. $image->image;
                if(file_exists($image_path)) {
                    unlink($image_path);
                }
            }
        }

        $product->delete();
        return redirect()->back()->with('success_message', 'Product successfully deleted!');

    }

    public function getCategoryPage()
    {
        $parents = Category::whereNull('parent_id')->get();
        $subcategories = Category::whereNotNull('parent_id')->orderBy('category_name', 'asc')->get();
        return view('admin.category.index', ['parents' => $parents, 'subcategories' => $subcategories]);
    }

    public function storeCategory(Request $request)
    {

        $input = $this->validate($request, [
            'category' => 'required|min:3|max:20|string',
            'parent' => 'integer'
        ]);
        $category = new Category();
        $category->category_name = $input['category'];
        if($request->parent) {
            $category->parent_id = $input['parent'];
        }
        $category->save();
        return redirect()->back()->with('success_message', 'Category successfully created!');
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        if($category->parent_id == null) {
            $categories = Category::where('parent_id', '=', $category->id)->get();
            foreach($categories as $item) {
                $item->delete();
            }
        }
        $category->delete();
        return redirect()->back()->with('success_message', 'Category successfully deleted');
    }

    public function getStatisticPage()
    {
        return view('admin.statistic.index');
    }

    public function getStockPage()
    {
        return view('admin.stock.index');
    }


}

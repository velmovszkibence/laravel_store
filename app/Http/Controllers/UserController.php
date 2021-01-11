<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\AccountCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Auth;
use Session;

class UserController extends Controller
{
    public function getSignup()
    {
        return view('user.signup');
    }

    public function postSignup(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required|unique:users,email',
            'password' => 'required|min:5'
        ]);

        $user = new User([
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        Mail::to($request->email)->send(new AccountCreated());
        $user->save();

        Auth::login($user);

        if(Session::has('previousUrl')) {
            $prevUrl = Session::get('previousUrl');
            Session::forget('previousUrl');
            return redirect()->to($prevUrl);
        }

        return redirect()->route('user.profile');

    }

    public function getSignin()
    {
        return view('user.signin');
    }

    public function postSignin(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')])) {
                if(auth()->user()->is_admin){
                    return redirect()->route('admin.dashboard');
                } else {
                    if(Session::has('previousUrl')) {
                        $prevUrl = Session::get('previousUrl');
                        Session::forget('previousUrl');
                        return redirect()->to($prevUrl);
                    }
                    return redirect()->route('user.profile');
                }
            }
        return redirect()->back();
    }

    public function getProfile()
    {
        $orders = Auth::user()->orders;
        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });
        return view('user.profile', ['orders' => $orders]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('product.index');
    }
}
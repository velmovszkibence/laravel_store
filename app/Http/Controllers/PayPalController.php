<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use Session;
use Srmklive\PayPal\Services\ExpressCheckout;

class PayPalController extends Controller
{
    public function payment()
    {
        if(!Session::has('cart')) {
            return view('shop.shopping-cart');
        }

        $prevCart = Session::get('cart');
        $cart = new Cart($prevCart);
        $totalPrice = (intval($cart->totalPrice));

        $data = [];
        $i = 0;
        foreach ($cart->items as $key => $item) {
            $data['items'][$i] = [
                'name' => strval($item['item']->name),
                'price' => intval($item['price']) / intval($item['quantity']),
                'desc' => 'Description for anything',
                'qty' => intval($item['quantity']),
            ];
            $i++;
        }

        $data['invoice_id'] = 1;

        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";

        $data['return_url'] = route('payment.success');

        $data['cancel_url'] = route('payment.cancel');
        $data['total'] = $totalPrice;

        $provider = new ExpressCheckout;

        $response = $provider->setExpressCheckout($data);
        $response = $provider->setExpressCheckout($data, true);

        return redirect($response['paypal_link']);

    }

    public function cancel()
    {
        return redirect()->route('product.index')->with('success', 'Your payment is cancelled');
    }

    public function success(Request $request)

    {

        $provider = new ExpressCheckout;
        $response = $provider->getExpressCheckoutDetails($request->token);

        if (in_array(strtoupper($response['ACK']), ['SUCCESS', 'SUCCESSWITHWARNING'])) {

            return redirect()->route('product.index')->with('success', 'Your order created successfully. Thank you for choosing us!');

        }

        return redirect()->route('checkout')->with('error', 'Something went wrong');

    }
}

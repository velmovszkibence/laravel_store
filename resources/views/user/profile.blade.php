@extends('layouts.main')

@section('content')

    <div class="container p-10 mx-auto">
        <div class="flex">
            <h2 class="mx-auto text-xl">My Orders</h2>
        </div>
        @if(count($orders) > 0)
        @foreach($orders as $order)
        <div class="flex items-center justify-evenly">
            <ul class="border-b-2 rounded-sm border-dotted border-black">
            @foreach($order->cart->items as $item)
                <li>
                    <span>$ {{ $item['price'] }}</span>
                    {{ $item['item']['name'] }} x {{ $item['quantity'] }}
                </li>
            @endforeach
            <p>Order created at {{ $order->created_at }}</p>
            <h2>Total Price: $ {{ $order->cart->totalPrice }}</h2>
            </ul>
            <a class="shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" href="#">Cancel Order</a>
        </div>
        @endforeach
        @else
        <div class="flex">
            <div class="m-auto">
                <h1>No orders found</h1>
            </div>
        </div>
        @endif
    </div>

@endsection

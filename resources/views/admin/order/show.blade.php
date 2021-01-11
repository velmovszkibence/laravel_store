@extends('layouts.admin')

@section('content')
<div class="h-screen flex flex-col">
<nav class="tabs flex flex-col sm:flex-row px-10 py-2 mb-2">
    <a href="{{ url()->previous() }}" class="text-sm tracking-widest text-gray-600 py-2 px-6 block hover:text-blue-500 focus:outline-none text-blue-500 active">
        <svg class="w-10 p-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
        </svg>
    </a>
</nav>
<div class="my-auto text-center text-xs md:mx-auto sm:text-sm lg:w-4/5">
    <div class="flex flex-row md:flex-col">
        <div class="grid grid-rows-6 grid-flow-col w-1/2 items-center text-center md:w-full md:grid-cols-7 md:grid-rows-none md:grid-flow-row md:bg-gray-200 md:text-left md:px-6 py-1 md:pr-6">
            <span class="py-2 bg-gray-200 md:bg-transparent">Id</span>
            <span class="py-2">Name</span>
            <span class="py-2 bg-gray-200 md:bg-transparent md:col-span-2">Address</span>
            <span class="py-2">Date</span>
            <span class="py-2 bg-gray-200 md:bg-transparent md:ml-auto ">Status</span>
            <span class="py-2 md:ml-auto">Action</span>
        </div>

        <div class="grid grid-rows-6 grid-flow-col w-1/2 items-center text-center md:w-full md:grid-cols-7 md:grid-rows-none md:grid-flow-row py-1 md:pr-6 md:border md:mt-4 md:text-left md:px-6">
            <span class="py-2 bg-gray-200 md:bg-transparent">#{{ $order->id }}</span>
            <span class="py-2">{{ $order->name }}</span>
            <span class="py-2 bg-gray-200 md:bg-transparent md:col-span-2">{{ $order->address }}, {{ $order->city }} {{ $order->country }}, {{ $order->zipcode }}</span>
            <span class="py-2">{{ $order->created_at }}</span>
            <span class="py-2 bg-gray-200 md:bg-transparent md:ml-auto md:pr-4">{{ $order->status }}</span>
            <button class="py-2 mx-auto md:ml-auto md:mr-0">
                <svg class="w-8 p-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
            </button>
        </div>
    </div>









    <div class="mt-10">
        <h1 class="bg-gray-200 text-left py-1 px-6">Ordered Products</h1>
        <div class="grid grid-rows-4 grid-flow-col sm:grid-cols-4 sm:grid-flow-row mt-5">
            <h2 class="py-3 border-b-2 border-dashed">Id</h2>
            <h2 class="py-3 border-b-2 border-dashed">Name</h2>
            <h2 class="py-3 border-b-2 border-dashed">Quantity</h2>
            <h2 class="py-3 border-b-2 border-dashed">Price</h2>
            @foreach($cartItems->items as $cart)
            <span class="py-3 sm:mt-4 border-b-2 border-dashed">#{{ $cart['item']['id'] }}</span>
            <span class="py-3 sm:mt-4 border-b-2 border-dashed">{{ $cart['item']['name'] }}</span>
            <span class="py-3 sm:mt-4 border-b-2 border-dashed">{{ $cart['item']['stock'] }}</span>
            <span class="py-3 sm:mt-4 border-b-2 border-dashed">{{ $cart['item']['price'] }}</span>
            @endforeach
        </div>
    </div>
</div>

</div>

@endsection

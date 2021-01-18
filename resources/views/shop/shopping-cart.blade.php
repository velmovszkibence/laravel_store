@extends('layouts.main')

@section('content')
    @if(Session::has('cart'))
        <div class="mx-auto p-4 mt-10 mb-8 md:p-10">
            <h1 class="text-center py-10 font-semibold tracking-widest xl:text-xl">Your Cart</h1>
            <div class="mx-auto text-lg md:w-2/3 lg:w-full xl:text-xl">
                @foreach($products as $product)
                    <div class="grid grid-cols-4 mb-10 pt-5 border-t-2 lg:grid-cols-8 lg:items-center">
                        <div class="col-span-2 mx-auto product-image">
                            <img src="/images/{{ $product['item']->images[0]['image'] }}" class="h-32 w-32 xl:h-64 xl:w-64" />
                        </div>
                        <div class="col-span-2 mx-auto w-full product-quantity flex items-center justify-evenly">
                            <h2 class="w-1/2 align-bottom text-center">{{ $product['quantity'] }}</h2>
                            <div class="flex flex-col w-1/2 flex-auto text-center">
                                <a class="px-1 mb-1 bg-orange text-white border rounded-full border-white" href="{{ route('product.increase', $product['item']['id']) }}">+</a>
                                <a class="px-1 bg-white text-orange border rounded-full border-orange" href="{{ route('product.decrease', $product['item']['id']) }}">-</a>
                            </div>
                        </div>
                        <div class="col-span-2 w-full text-center py-2 product-name">
                            <h2 class="mx-auto">{{ $product['item']['name'] }}</h2>
                        </div>
                        <div class="col-span-2 w-4/5 text-right py-2 product-price lg:col-span-1">
                            <span>$ {{ $product['price'] }}</span>
                        </div>
                        <div class="col-span-4 mt-5 text-center lg:col-span-1 lg:mt-0">
                            <a class="shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" href="{{ route('product.delete', $product['item']['id']) }}">Remove</a>
                        </div>
                    </div>
                @endforeach
                <div class="flex flex-col-reverse items-center border-t-2 sm:flex-row sm:justify-evenly">
                    <div class="py-10 w-4/5 sm:w-1/3 sm:px-4 md:w-1/2 lg:w-1/4">
                        <a href="{{ url()->previous() }}" class="flex justify-evenly text-center text-white text-sm bg-gray-500 rounded-lg py-2 md:p-2 md:text-lg">
                            <svg class="w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M7.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                            </svg>
                            Continue shopping
                        </a>
                    </div>
                    <div class="py-10 w-4/5 sm:w-1/3 sm:px-4 md:w-1/2 lg:w-1/4">
                        <a href="{{ route('checkout') }}" class="flex justify-evenly text-center text-white text-sm bg-green-500 rounded-lg p-2 md:text-lg">
                            <svg class="w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Proceed to checkout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container mx-auto p-10 mt-16">
            <h1 class="p-4 bg-red-600 text-white">There are no items in your cart yet!</h1>
        </div>
    @endif
@endsection()

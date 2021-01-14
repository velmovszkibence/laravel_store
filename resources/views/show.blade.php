@extends('layouts.main')

@section('content')

    {{-- <div class="w-full h-full loading">
        <span class="top-1/2 my-0 mx-auto my-auto block relative w-0 h-0" style="
            top: 50%;">
        <svg width="80" height="80" viewBox="0 0 50 50">
            <path fill="#48bb78" d="M25,5A20.14,20.14,0,0,1,45,22.88a2.51,2.51,0,0,0,2.49,2.26h0A2.52,2.52,0,0,0,50,22.33a25.14,25.14,0,0,0-50,0,2.52,2.52,0,0,0,2.5,2.81h0A2.51,2.51,0,0,0,5,22.88,20.14,20.14,0,0,1,25,5Z">
                <animateTransform attributeName="transform" type="rotate" from="0 25 25" to="360 25 25" dur="0.7s" repeatCount="indefinite" />
            </path>
        </svg>
        </span>
    </div> --}}

    <div class="container product-container mx-auto mt-16 sm:px-12 sm:text-lg">
        <div class="grid grid-cols-1 lg:grid-cols-2 text-center">
            <div class="p-2 half-width flex flex-col">
                <div class="w-3/4 mx-auto border-2 rounded-lg flex flex-col flex-1">
                    <img class="w-48 sm:w-64 m-auto" src="/images/{{ $product['image'] }}" alt="productimg" />
                </div>
                <div class="flex flex-1 items-center justify-between w-3/4 mx-auto mt-12">
                    <img class="w-16 sm:w-24 border-2 rounded-md rounded-lg p-1 cursor-pointer hover:bg-orange" src="/images/{{ $product['image'] }}" alt="productimg" />
                    <img class="w-16 sm:w-24 border-2 rounded-md rounded-lg p-1 cursor-pointer hover:bg-orange" src="/images/{{ $product['image'] }}" alt="productimg" />
                    <img class="w-16 sm:w-24 border-2 rounded-md rounded-lg p-1 cursor-pointer hover:bg-orange" src="/images/{{ $product['image'] }}" alt="productimg" />
                </div>
            </div>
            <div class="p-2 flex flex-col justify-between font-semibold">
                <h2 class="mt-10">{{ $product['name'] }}</h2>
                <p class="px-10 mt-10 font-thin">{{ $product['description'] }}</p>
                <h2 class="mt-10">${{ $product['price'] }}</h2>
                <button class="add-to-cart-btn mt-10 text-white rounded-lg flex mx-auto w-1/2 h-10">
                    <svg class="w-1/6 md:w-2/6 lg:w-1/6 p-2 bg-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <a href="{{ route('product.addtocart', ['id' => $product['id']]) }}" class="mx-auto flex items-center"><span class="block font-bold text-xs">ADD TO CART</span></a>
                </button>
            </div>
        </div>
    </div>
@endsection

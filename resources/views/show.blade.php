@extends('layouts.main')

@section('content')

    <div class="container product-container mx-auto mt-16 lg:mt-32 sm:px-12 sm:text-lg">
        <div class="grid grid-cols-1 lg:grid-cols-2 text-center">
            <div class="p-2 half-width flex flex-col">
                <div class="w-3/4 mx-auto border-4 rounded-lg flex flex-col flex-1">
                    <img class="w-48 sm:w-64 m-auto" src="/images/{{ $product->images[0]['image'] }}" alt="productimg" />
                </div>
                <div class="flex flex-1 items-center justify-around lg:justify-between w-3/4 mx-auto mt-12">
                    @foreach($product->images as $image)
                        <img class="product-images w-16 sm:w-24 border-4 rounded-lg p-1 cursor-pointer hover:border-orange active:border-orange" src="/images/{{ $image->image }}" alt="productimg" />
                    @endforeach
                </div>
            </div>
            <div class="py-2 px-10 flex flex-col justify-between font-semibold">
                <h2 class="mt-10 lg:mt-0 uppercase">{{ $product['name'] }}</h2>
                <h2 class="mt-10 text-left font-semibold text-gray-800">Description</h2>
                <p class="mt-4 font-thin text-left text-gray-700">{{ str_limit($product['description'], 400, '....') }}</p>
                @if(strlen(strip_tags($product['description'])) > 400)
                <a href='#full-desc' class='py-2 text-left text-gray-800 font-semibold underline text-sm hover:text-gray-400'>READ MORE</a>
                @endif
                <h2 class="mt-10">${{ $product['price'] }}</h2>
                @if($product->inStock())
                <button class="add-to-cart-btn mt-10 text-white rounded-lg flex mx-auto w-1/2 h-10">
                    <svg class="w-1/6 md:w-2/6 lg:w-1/6 p-2 bg-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <a href="{{ route('product.addtocart', ['id' => $product['id']]) }}" class="mx-auto flex items-center"><span class="block font-bold text-xs">ADD TO CART</span></a>
                </button>
                @else
                <button class="mt-10 text-white text-center rounded-lg flex mx-auto w-1/2 h-10 cursor-default items-center">
                    <span class="w-full py-2 px-1 font-bold text-xs bg-gray-300 text-black">Out of stock</span>
                </button>
                @endif
            </div>
        </div>
        @if(strlen(strip_tags($product['description'])) > 400)
        <div class="mt-32 px-10 lg:p-2 flex flex-col justify-center">
            <h2 class="text-gray-800 font-semibold uppercase" id="full-desc">Product Details</h2>
            <p class="mt-10 text-gray-700">{{ $product['description'] }}</p>
        </div>
        @endif
    </div>
@endsection

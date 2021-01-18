@extends('layouts.main')

@section('styles')
@include('includes.fonts.fonts')
@endsection

@section('showcase')
@include('includes.showcase')
@endsection

@section('content')

<div class="container mx-auto my-20">
    @if(Session::has('success'))
        <div class="flex flex-row mx-auto p-4 mb-10 bg-green-400 w-1/2 border-2 border-green-500 rounded-lg flash-msg">
            <strong class="mx-auto">{{ Session::get('success') }}</strong><button class="ml-auto">X</button>
        </div>
    @endif
    {{-- Show featured products only if it's home page --}}
    @if(strpos(url()->full(), 'page') == false && strpos(url()->full(), '?q=') == false)
    <div class="featured-products pb-20 px-10" id="#featured">
        <h2 style="font-family: Overpass" class="uppercase tracking-widest text-xl italic text-center font-bold pb-8">
            Featured Products
        </h2>

        <div class="flex flex-wrap text-center gap-8 justify-center">
            @foreach($featured as $product)
                    <div class="product product-for-sale relative my-10 h-64 mx-auto">
                        <span class="off absolute transform rotate-45 text-white text-md text-semibold">{{ $product->discount }}%<i class="text-xs"> OFF</i></span>
                        <a href="{{ route('product.show', $product['id']) }}">
                            <img src="/images/{{ $product->images[0]['image'] }}" alt="productimg" class="h-56 mx-auto product-img" />
                            <h2 class="mt-4 text-sm">{{ $product['name'] }}</h2>
                            <div class="flex flex-row">
                                <h2 class="pt-2 w-1/3 line-through text-sm text-right">${{ $product['price'] }}</h2>
                                <h2 class="pt-2 w-1/3 text-center text-xl font-semibold text-red-600">${{ $product->calculatePrice() }}</h2>
                                <h2 class="w-1/3"></h2>
                            </div>
                        </a>

                        <div class="add-to-cart w-full">
                            @if($product->inStock())
                                <button class="add-to-cart-btn text-white font-semibold rounded-lg flex mx-auto">
                                    <svg class="w-8 p-2 bg-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    <a href="{{ route('product.addtocart', ['id' => $product['id']]) }}"><span class="py-2 px-1 font-bold text-xs">ADD TO CART</span></a>
                                </button>
                            @endif
                            @if($product->outOfStock())
                                <button class="add-to-cart-btn font-semibold rounded-lg flex mx-auto cursor-default">
                                    <span class="py-2 px-1 font-bold text-xs bg-gray-300 text-black">Out of stock</span>
                                </button>
                            @endif
                        </div>
                    </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
<div class="container mx-auto my-20">
    <div class="new-products px-10" id="new">
        @if(strpos(url()->full(), 'page') == false && strpos(url()->full(), '?q=') == false)
        <h2 style="font-family: Overpass" class="uppercase tracking-widest text-xl italic text-center font-bold pb-8">
            New Products
        </h2>
        @endif
        <div class="flex flex-wrap text-center gap-8 justify-center">
            @foreach($products as $product)

                    @if($product->discount != 0 && $product->discount != NULL)
                        <div class="product product-for-sale relative my-10 h-64 mx-auto">
                            <span class="off absolute transform rotate-45 text-white text-md text-semibold">{{ $product->discount }}%<i class="text-xs"> OFF</i></span>
                            <a href="{{ route('product.show', $product['id']) }}">
                                <img src="/images/{{ $product->images[0]['image'] }}" alt="productimg" class="h-56 mx-auto product-img" />
                                <h2 class="mt-4 text-sm">{{ $product['name'] }}</h2>
                                <div class="flex flex-row">
                                    <h2 class="pt-2 w-1/3 line-through text-sm text-right">${{ $product['price'] }}</h2>
                                    <h2 class="pt-2 w-1/3 text-center text-xl font-semibold text-red-600">${{ $product->calculatePrice() }}</h2>
                                    <h2 class="w-1/3"></h2>
                                </div>
                            </a>

                            <div class="add-to-cart w-full">
                                @if($product->inStock())
                                    <button class="add-to-cart-btn text-white font-semibold rounded-lg flex mx-auto">
                                        <svg class="w-8 p-2 bg-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        <a href="{{ route('product.addtocart', ['id' => $product['id']]) }}"><span class="py-2 px-1 font-bold text-xs">ADD TO CART</span></a>
                                    </button>
                                @endif
                                @if($product->outOfStock())
                                    <button class="add-to-cart-btn font-semibold rounded-lg flex mx-auto cursor-default">
                                        <span class="py-2 px-1 font-bold text-xs bg-gray-300 text-black">Out of stock</span>
                                    </button>
                                @endif
                            </div>
                        </div>
                    @else
                    <div class="product relative my-10 h-64 mx-auto">
                        <a href="{{ route('product.show', $product['id']) }}">
                            <img src="/images/{{ $product->images[0]['image']}}" alt="productimg" class="h-56 mx-auto product-img" />
                            <h2 class="mt-4 text-sm">{{ $product['name'] }}</h2>
                            <h2 class="pt-2 text-lg">${{ $product['price'] }}</h2>
                        </a>

                        <div class="add-to-cart w-full">
                            @if($product->inStock())
                                <button class="add-to-cart-btn text-white font-semibold rounded-lg flex mx-auto">
                                    <svg class="w-8 p-2 bg-gray-800" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    <a href="{{ route('product.addtocart', ['id' => $product['id']]) }}"><span class="py-2 px-1 font-bold text-xs">ADD TO CART</span></a>
                                </button>
                            @endif
                            @if($product->outOfStock())
                                <button class="add-to-cart-btn font-semibold rounded-lg flex mx-auto cursor-default">
                                    <span class="py-2 px-1 font-bold text-xs bg-gray-300 text-black">Out of stock</span>
                                </button>
                            @endif
                        </div>
                    </div>
                    @endif
            @endforeach
        </div>
    </div>
</div>
<div class="container mx-auto my-10">
    {{ $products->links('pagination::tailwind') }}
</div>

@endsection

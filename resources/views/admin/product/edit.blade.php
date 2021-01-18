@extends('layouts.admin')

@section('content')
<nav class="tabs flex flex-col sm:flex-row px-10 py-2 mb-2">
    <a href="{{ url()->previous() }}" class="text-sm tracking-widest text-white py-2 px-6 block hover:text-blue-500 focus:outline-none text-blue-500 active">
        <svg class="w-10 p-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
        </svg>
    </a>
</nav>
<div class="grid min-h-80 place-items-center mt-10 lg:mt-0">
    <div class="mx-auto text-center text-xs sm:text-sm lg:w-4/5">
        {!! Form::model($product, ['method'=>'PATCH', 'action'=>['App\Http\Controllers\AdminController@updateProduct', $product->id], 'files' => true]) !!}
        <div class="container">
            <div class="grid grid-cols sm:grid-cols-2 sm:px-6 lg:px-0">
                <div class="flex flex-col mx-auto w-auto lg:w-full xl:w-3/4 bg-gradient-to-r from-blue-600 via-blue-600 to-teal-500 py-4 px-8 rounded-lg shadow-lg shadow-outer">
                    <div class="w-full px-3 mb-8">
                        <label class="block text-white text-sm font-semibold" for="name">Title</label>
                        <input placeholder="{{ $product->name }}" class="border-2 border-gray-800 rounded-lg text-center block w-full p-3 mt-2 placeholder-white text-white bg-transparent focus:shadow-xl focus:shadow-outer focus:border-white focus:outline-none" id="name" name="name" type="text">
                    </div>
                    <div class="w-full flex flex-col sm:flex-row px-3 mb-8 justify-evenly">
                        <div class="w-1/3">
                            <label class="block text-white text-sm font-semibold" for="price">
                                Price
                            </label>
                            <input placeholder="{{ $product->price }}" class="border-2 border-gray-800 rounded-lg text-center block w-full p-3 mt-2 placeholder-white text-white bg-transparent focus:shadow-xl focus:shadow-outer focus:border-white focus:outline-none" id="price" name="price" type="number" step="0.01">
                        </div>
                        <div class="w-1/3">
                            <label class="block text-white text-sm font-semibold" for="discount">
                                Discount
                            </label>
                            <input placeholder="{{ $product->discount }} %" class="border-2 border-gray-800 rounded-lg text-center block w-full p-3 mt-2 placeholder-white text-white bg-transparent focus:shadow-xl focus:shadow-outer focus:border-white focus:outline-none" id="discount" name="discount" type="number">
                        </div>
                    </div>
                    <div class="w-full px-3 mb-8">
                        <label class="block text-white text-sm font-semibold" for="stock">
                            Stock
                        </label>
                        <input placeholder="{{ $product->stock }}" class="border-2 border-gray-800 rounded-lg text-center block w-full p-3 mt-2 placeholder-white text-white bg-transparent focus:shadow-xl focus:shadow-outer focus:border-white focus:outline-none" id="stock" name="stock" type="number">
                    </div>
                    <div class="w-full px-3 mb-8">
                        <label class="block text-white text-sm font-semibold" for="description">
                            Description
                        </label>
                        <textarea placeholder="{{ $product->description }}" class="border-2 border-gray-800 rounded-lg block w-full p-3 mt-2 placeholder-white text-white bg-transparent focus:shadow-xl focus:shadow-outer focus:border-white focus:outline-none" rows="10" id="description" name="description" cols="30"></textarea>
                    </div>

                </div>

                <div class="flex flex-col mx-auto mt-4 justify-evenly">
                    <div class="flex flex-col xl:flex-row xl:items-end">
                        <div class="w-full xl:w-1/3 px-3 mb-8">
                            <img src="/images/{{ !empty($product->images[0]->image) ? $product->images[0]->image : '' }}" id="product-image-src-f" class="mx-auto mb-10" width="200px" />
                            <a onclick="document.getElementById('product-image-f').click()" class="w-2/3 py-1 cursor-pointer shadow bg-blue-600 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold md:py-2 px-4 rounded">Upload Image</a>
                            <input value="{{ !empty($product->images[0]->image) ? $product->images[0]->image : null }}" type="file" class="hidden" id="product-image-f" name="product_image[]" multiple>
                        </div>
                        <div class="w-full xl:w-1/3 px-3 mb-8">
                            <img src="/images/{{ !empty($product->images[1]->image) ? $product->images[1]->image : '' }}" id="product-image-src-s" class="mx-auto mb-10" width="200px" />
                            <a onclick="document.getElementById('product-image-s').click()" class="w-2/3 py-1 cursor-pointer shadow bg-blue-600 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold md:py-2 px-4 rounded">Upload Image</a>
                            <input value="{{ !empty($product->images[1]->image) ? $product->images[1]->image : null }}" type="file" class="hidden" id="product-image-s" name="product_image[]" multiple>
                        </div>
                        <div class="w-full xl:w-1/3 px-3 mb-8">
                            <img src="/images/{{ !empty($product->images[2]->image) ? $product->images[2]->image : '' }}" id="product-image-src-t" class="mx-auto mb-10" width="200px" />
                            <a onclick="document.getElementById('product-image-t').click()" class="w-2/3 py-1 cursor-pointer shadow bg-blue-600 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold md:py-2 px-4 rounded">Upload Image</a>
                            <input value="{{ !empty($product->images[2]->image) ? $product->images[2]->image : null }}" type="file" class="hidden" id="product-image-t" name="product_image[]" multiple>
                        </div>
                    </div>

                    <div class="w-full px-3 mb-8">
                        <input type="submit" value="Update" class="w-2/3 py-1 cursor-pointer shadow bg-green-500 hover:bg-green-400 focus:shadow-outline focus:outline-none text-white font-bold md:py-2 px-4 rounded">
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>

@endsection

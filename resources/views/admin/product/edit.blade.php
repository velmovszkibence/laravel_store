@extends('layouts.admin')

@section('content')
<nav class="tabs flex flex-col sm:flex-row px-10 py-2 mb-2">
    <a href="{{ url()->previous() }}" class="text-sm tracking-widest text-gray-600 py-2 px-6 block hover:text-blue-500 focus:outline-none text-blue-500 active">
        <svg class="w-10 p-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
        </svg>
    </a>
</nav>
<div class="grid min-h-80 place-items-center mt-10">
    <div class="mx-auto text-center text-xs sm:text-sm lg:w-4/5">
        {!! Form::model($product, ['method'=>'PATCH', 'action'=>['App\Http\Controllers\AdminController@updateProduct', $product->id], 'files' => true]) !!}
        <div class="container">
            <div class="grid grid-cols sm:grid-cols-2">
                <div class="flex flex-col mx-auto w-auto md:w-64">
                    <div class="w-full px-3 mb-8">
                        <label class="block text-gray-600 text-sm font-semibold" for="name">Title</label>
                        <input placeholder="{{ $product->name }}" class="border-l border-r border-solid border-blue-500 text-center block w-full p-3 mt-2 text-gray-700 bg-gray-200 focus:bg-gray-300 focus:shadow-inner focus:outline-none" id="name" name="name" type="text">
                    </div>
                    <div class="w-full flex flex-col sm:flex-row px-3 mb-8 justify-evenly">
                        <div class="w-1/3">
                            <label class="block text-gray-600 text-sm font-semibold" for="price">
                                Price
                            </label>
                            <input placeholder="{{ $product->price }}" class="border-l border-r border-solid border-blue-500 text-center block w-full p-3 mt-2 text-gray-700 bg-gray-200 focus:bg-gray-300 focus:shadow-inner focus:outline-none" id="price" name="price" type="number" step="0.01">
                        </div>
                        <div class="w-1/3">
                            <label class="block text-gray-600 text-sm font-semibold" for="discount">
                                Discount
                            </label>
                            <input placeholder="{{ $product->discount }} %" class="border-l border-r border-solid border-blue-500 text-center block w-full p-3 mt-2 text-gray-700 bg-gray-200 focus:bg-gray-300 focus:shadow-inner focus:outline-none" id="discount" name="discount" type="number">
                        </div>
                    </div>
                    <div class="w-full px-3 mb-8">
                        <label class="block text-gray-600 text-sm font-semibold" for="stock">
                            Stock
                        </label>
                        <input placeholder="{{ $product->stock }}" class="border-l border-r border-solid border-blue-500 text-center block w-full p-3 mt-2 text-gray-700 bg-gray-200 focus:bg-gray-300 focus:shadow-inner focus:outline-none" id="stock" name="stock" type="number">
                    </div>
                    <div class="w-full px-3 mb-8">
                        <label class="block text-gray-600 text-sm font-semibold" for="description">
                            Description
                        </label>
                        <textarea placeholder="{{ $product->description }}" class="border-l border-r border-solid border-blue-500 block w-full p-3 mt-2 text-gray-700 bg-gray-200 focus:bg-gray-300 focus:shadow-inner focus:outline-none" rows="10" id="description" name="description" cols="30"></textarea>
                    </div>

                </div>

                <div class="flex flex-col mx-auto mt-4 justify-evenly">
                    <div class="w-full px-3 mb-8">
                        <a onclick="document.getElementById('product-image').click()" class="w-2/3 py-1 cursor-pointer shadow bg-blue-600 hover:bg-blue-400 focus:shadow-outline focus:outline-none text-white font-bold md:py-2 px-4 rounded">Upload Image</a>
                        <input type="file" class="hidden" id="product-image" name="product-image">
                        <img src="/images/{{ $product->image }}" id="product-image-src" class="mx-auto mt-10" width="200px" />
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

@extends('layouts.admin')

@section('content')

<div class="-mb-10 min-h-80">
    <div id="panels">
        <div class="bg-white">
            <nav class="tabs flex flex-col sm:flex-row px-10 py-2 mb-2">
                <button data-target="panel-1" class="tab text-sm tracking-widest text-gray-600 py-2 px-6 block hover:text-blue-500 focus:outline-none text-blue-500 border-b-2 border-blue-500 active">
                    All products
                </button>
                <button data-target="panel-2" class="tab text-sm tracking-widest text-gray-600 py-2 px-6 block hover:text-blue-500 focus:outline-none">
                    New product
                </button>
            </nav>
        </div>

        <div class="panel-1 tab-content active">
            <div class="mx-auto text-center text-xs sm:text-sm xl:w-4/5">
                <div class="flex flex-row justify-end mb-10 md:mb-0">
                    <?php $link = ['route' => 'admin.product.index'] ?>
                    @include('admin.includes.searchform', $link)
                </div>
                @if(session('not-found'))
                <div class="flex text-center">
                    <h1 class="m-auto">{{ session('not-found') }}</h1>
                </div>
                @elseif ($errors->any())
                <div class="p-4 mb-10 bg-red-400 w-1/2 border-2 border-red-500 text-white text-center shadow-lg rounded-lg">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @else
                    @if($products)
                    @foreach($products as $product)
                    <a href="{{ route('admin.product.edit', $product->id) }}">
                    <div class="grid grid-cols-2 mb-10 md:mb-0 sm:px-6 md:grid-cols-10 lg:grid-cols-12 xl:grid-cols-8 py-1 pr-6 items-center border-b dotted">
                        <span class="mx-auto row-span-3 md:col-span-2 md:row-auto xl:col-span-1 xl:row-span-1"><img class="h-24 w-24" src="/images/{{ !empty($product->images[0]->image) ? $product->images[0]->image : '' }}"/></span>
                        <span class="md:col-span-2 xl:col-span-1">{{ $product->name }}</span>
                        <p class="hidden break-words overflow-y-auto max-h-10 py-2 text-xs text-center md:max-h-24 md:col-span-2 md:text-xs lg:block">{{ $product->description }}</p>
                        <span class="py-2">$ {{ $product->price }}</span>
                        <span>stock: {{ $product->stock }}</span>
                        <div class="my-4 md:my-0 md:mx-auto md:col-span-2 xl:col-span-1">
                        @if ($product->is_active == 1)
                            {!! Form::open(['method'=>'PATCH','action'=>['App\Http\Controllers\AdminController@activateProduct']]) !!}
                                <input type="hidden" name="is_active" value="0">
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <div class='form-group'>
                                    {!! Form::submit('Deactivate',['class'=>'py-1 md:w-full cursor-pointer shadow bg-orange hover:bg-red-900 focus:shadow-outline focus:outline-none text-white font-bold md:py-2 px-2 rounded']) !!}
                                </div>
                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['method'=>'PATCH','action'=>['App\Http\Controllers\AdminController@activateProduct']]) !!}
                                <input type="hidden" name="is_active" value="1">
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <div class='form-group'>
                                    {!! Form::submit('Activate',['class'=>'py-1 md:w-full cursor-pointer shadow bg-green-500 hover:bg-green-400 focus:shadow-outline focus:outline-none text-white font-bold md:py-2 px-4 rounded']) !!}
                                </div>
                            {!! Form::close() !!}
                        @endif
                        </div>
                        <div class="my-4 md:my-0 md:mx-auto md:col-span-2 xl:col-span-1">
                            {!! Form::open(['method'=>'POST','action'=>['App\Http\Controllers\AdminController@destroyProduct', $product->id]]) !!}
                                <div class='form-group' onclick="return confirm('Are you sure you want to remove this product?')">
                                    {!! Form::submit('Remove',['class'=>'py-1 md:w-full cursor-pointer shadow bg-red-500 hover:bg-red-400 focus:shadow-outline focus:outline-none text-white font-bold md:py-2 px-4 rounded']) !!}
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    </a>
                    @endforeach
                    @endif
                @endif
            </div>
        </div>
        <div class="panel-2 tab-content mt-10">
            <div class="grid min-h-80 place-items-center">
                <div class="mx-auto text-center text-xs sm:text-sm w-full lg:w-4/5">
                    @include('admin.product.create')
                </div>
            </div>
        </div>

    </div>
</div>
<div class="mt-20 tailwind-pagination">
        {{ $products->links('pagination::tailwind') }}
</div>


@endsection

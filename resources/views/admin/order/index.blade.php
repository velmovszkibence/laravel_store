@extends('layouts.admin')

@section('content')

<div class="h-screen flex flex-col md:px-4">
    <div id="panels" class="my-auto">
        <div class="bg-white">
            <nav class="tabs flex flex-col sm:flex-row px-10 py-2 mb-2">
                <button data-target="panel-1" class="tab text-sm tracking-widest text-gray-600 py-2 px-6 block hover:text-blue-500 focus:outline-none text-blue-500 border-b-2 border-blue-500 active">
                    All orders
                </button>
            </nav>
        </div>
        <div class="panel-1 tab-content active">
            <div class="mx-auto text-center text-xs sm:text-sm xl:w-4/5">
                <div class="flex flex-row justify-end">
                    <?php $link = ['route' => 'admin.order.index'] ?>
                     @include('admin.includes.searchform', $link)
                </div>
                <div class="grid grid-cols-3 text-center mt-4 py-1 pr-6 items-center bg-gray-100 sm:text-left sm:px-6 md:text-xs md:text-center md:grid-cols-9 lg:text-sm">
                    <span>Id</span>
                    <span class="md:col-span-2">Name</span>
                    <span class="hidden col-span-2 md:block">Address</span>
                    <span class="md:col-span-2">Date</span>
                    <span class="hidden md:col-span-2 md:block">Status</span>
                </div>
                @foreach($orders as $order)
                <a href="{{ route('admin.order.show', $order->id) }}">
                @if($order->status == 'Pending')

                    <div class="grid grid-cols-3 text-center relative py-3 pr-6 items-center border mt-4 sm:text-left sm:px-6 md:pr-1 md:text-xs md:text-center md:grid-cols-9 md:pr-1 lg:text-sm bg-gradient-to-r from-white via-red-300 to-red-600">
                        <span>#{{ $order->id }}</span>
                        <span class="md:col-span-2">{{ $order->name }}</span>
                        <span class="hidden col-span-2 md:block">{{ $order->address }}, {{ $order->city }} {{ $order->country }}, {{ $order->zipcode }}</span>
                        <span class="md:col-span-2">{{ $order->created_at }}</span>
                        <button class="hidden border border-white outline-none focus:outline-none focus:shadow-none hover:border-transparent hover:bg-white order-options ml-auto p-2 md:col-span-2 md:flex md:flex-row md:justify-evenly md:w-full">
                            <span class="ml-auto">{{ $order->status }}</span>
                            <svg class="w-4 ml-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <ul class="order-option-list hidden bg-white text-white px-12 pt-20 pb-8 z-10 border-b shadow-inner shadow-2xl">
                            <li>
                                {!! Form::open(['method'=>'PATCH','action'=>['App\Http\Controllers\AdminController@updateOrderStatus']]) !!}
                                    <input type="hidden" name="status" value="Pending">
                                    <input type="hidden" name="id" value="{{ $order->id }}">
                                    {!! Form::submit('Pending',['class'=>'bg-red-500 hover:bg-red-400 border-1 rounded-md mb-1 py-1 w-full px-10 cursor-pointer']) !!}
                                {!! Form::close() !!}
                            </li>
                            <li>
                                {!! Form::open(['method'=>'PATCH','action'=>['App\Http\Controllers\AdminController@updateOrderStatus']]) !!}
                                    <input type="hidden" name="status" value="Dispatched">
                                    <input type="hidden" name="id" value="{{ $order->id }}">
                                    {!! Form::submit('Dispatched',['class'=>'bg-green-500 hover:bg-green-400 border-1 rounded-md mb-1 py-1 w-full px-10 cursor-pointer']) !!}
                                {!! Form::close() !!}
                            </li>
                            <li>
                                {!! Form::open(['method'=>'PATCH','action'=>['App\Http\Controllers\AdminController@updateOrderStatus']]) !!}
                                    <input type="hidden" name="status" value="Completed">
                                    <input type="hidden" name="id" value="{{ $order->id }}">
                                    {!! Form::submit('Completed',['class'=>'bg-gray-500 hover:bg-gray-400 border-1 rounded-md mb-1 py-1 w-full px-10 cursor-pointer']) !!}
                                {!! Form::close() !!}
                            </li>
                        </ul>
                    </div>

                @elseif($order->status == 'Dispatched')

                    <div class="grid grid-cols-3 text-center relative py-3 pr-6 items-center border mt-4 sm:text-left sm:px-6 md:pr-1 md:text-xs md:text-center md:grid-cols-9 lg:text-sm bg-gradient-to-r from-white via-green-300 to-green-500">
                        <span>#{{ $order->id }}</span>
                        <span class="md:col-span-2">{{ $order->name }}</span>
                        <span class="hidden col-span-2 md:block">{{ $order->address }}, {{ $order->city }} {{ $order->country }}, {{ $order->zipcode }}</span>
                        <span class="md:col-span-2">{{ $order->created_at }}</span>
                        <button class="hidden border border-white outline-none focus:outline-none focus:shadow-none hover:border-transparent hover:bg-white order-options ml-auto p-2 md:col-span-2 md:flex md:flex-row md:justify-evenly md:w-full">
                            <span class="ml-auto">{{ $order->status }}</span>
                            <svg class="w-4 ml-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <ul class="order-option-list hidden bg-white text-white px-12 pt-20 pb-8 z-10 border-b shadow-inner shadow-2xl">
                            <li>
                                {!! Form::open(['method'=>'PATCH','action'=>['App\Http\Controllers\AdminController@updateOrderStatus']]) !!}
                                    <input type="hidden" name="status" value="Pending">
                                    <input type="hidden" name="id" value="{{ $order->id }}">
                                    {!! Form::submit('Pending',['class'=>'bg-red-500 hover:bg-red-400 border-1 rounded-md mb-1 py-1 w-full px-10 cursor-pointer']) !!}
                                {!! Form::close() !!}
                            </li>
                            <li>
                                {!! Form::open(['method'=>'PATCH','action'=>['App\Http\Controllers\AdminController@updateOrderStatus']]) !!}
                                    <input type="hidden" name="status" value="Dispatched">
                                    <input type="hidden" name="id" value="{{ $order->id }}">
                                    {!! Form::submit('Dispatched',['class'=>'bg-green-500 hover:bg-green-400 border-1 rounded-md mb-1 py-1 w-full px-10 cursor-pointer']) !!}
                                {!! Form::close() !!}
                            </li>
                            <li>
                                {!! Form::open(['method'=>'PATCH','action'=>['App\Http\Controllers\AdminController@updateOrderStatus']]) !!}
                                    <input type="hidden" name="status" value="Completed">
                                    <input type="hidden" name="id" value="{{ $order->id }}">
                                    {!! Form::submit('Completed',['class'=>'bg-gray-500 hover:bg-gray-400 border-1 rounded-md mb-1 py-1 w-full px-10 cursor-pointer']) !!}
                                {!! Form::close() !!}
                            </li>
                        </ul>
                    </div>

                @elseif($order->status == 'Completed')

                    <div class="grid grid-cols-3 text-center relative py-3 pr-6 items-center border mt-4 sm:text-left sm:px-6 md:pr-1 md:text-xs md:text-center md:grid-cols-9 lg:text-sm bg-gradient-to-r from-white via-gray-300 to-gray-500">
                        <span>#{{ $order->id }}</span>
                        <span class="md:col-span-2">{{ $order->name }}</span>
                        <span class="hidden col-span-2 md:block">{{ $order->address }}, {{ $order->city }} {{ $order->country }}, {{ $order->zipcode }}</span>
                        <span class="md:col-span-2">{{ $order->created_at }}</span>
                        <button class="hidden border border-white outline-none focus:outline-none focus:shadow-none hover:border-transparent hover:bg-white order-options ml-auto p-2 md:col-span-2 md:flex md:flex-row md:justify-evenly md:w-full">
                            <span class="ml-auto">{{ $order->status }}</span>
                            <svg class="w-4 ml-auto" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <ul class="order-option-list hidden bg-white text-white px-12 pt-20 pb-8 z-10 border-b shadow-inner shadow-2xl">
                            <li>
                                {!! Form::open(['method'=>'PATCH','action'=>['App\Http\Controllers\AdminController@updateOrderStatus']]) !!}
                                    <input type="hidden" name="status" value="Pending">
                                    <input type="hidden" name="id" value="{{ $order->id }}">
                                    {!! Form::submit('Pending',['class'=>'bg-red-500 hover:bg-red-400 border-1 rounded-md mb-1 py-1 w-full px-10 cursor-pointer']) !!}
                                {!! Form::close() !!}
                            </li>
                            <li>
                                {!! Form::open(['method'=>'PATCH','action'=>['App\Http\Controllers\AdminController@updateOrderStatus']]) !!}
                                    <input type="hidden" name="status" value="Dispatched">
                                    <input type="hidden" name="id" value="{{ $order->id }}">
                                    {!! Form::submit('Dispatched',['class'=>'bg-green-500 hover:bg-green-400 border-1 rounded-md mb-1 py-1 w-full px-10 cursor-pointer']) !!}
                                {!! Form::close() !!}
                            </li>
                            <li>
                                {!! Form::open(['method'=>'PATCH','action'=>['App\Http\Controllers\AdminController@updateOrderStatus']]) !!}
                                    <input type="hidden" name="status" value="Completed">
                                    <input type="hidden" name="id" value="{{ $order->id }}">
                                    {!! Form::submit('Completed',['class'=>'bg-gray-500 hover:bg-gray-400 border-1 rounded-md mb-1 py-1 w-full px-10 cursor-pointer']) !!}
                                {!! Form::close() !!}
                            </li>
                        </ul>
                    </div>
                @endif

                </a>
                @endforeach
            </div>
        </div>

    </div>
    <div class="my-auto tailwind-pagination">
        {{ $orders->links('pagination::tailwind') }}
    </div>

</div>
@endsection

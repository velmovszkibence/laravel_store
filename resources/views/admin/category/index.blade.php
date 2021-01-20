@extends('layouts.admin')

@section('content')
<nav class="tabs flex flex-col sm:flex-row px-10 py-2 mb-2">
    <a href="{{ route('admin.dashboard') }}" class="text-sm tracking-widest text-white py-2 px-6 block hover:text-blue-500 focus:outline-none text-blue-500 active">
        <svg class="w-10 p-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h10a8 8 0 018 8v2M3 10l6 6m-6-6l6-6" />
        </svg>
    </a>
</nav>
<div class="grid min-h-80 place-items-center mt-10 lg:mt-0">
    <div class="mx-auto text-center text-xs sm:text-sm w-full lg:w-4/5 xl:w-full grid grid-cols-2">
        <div>
            {!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\AdminController@storeCategory']) !!}
            <div class="container">
                <div class="grid grid-cols sm:px-6">
                    <div class="flex flex-col mx-auto w-auto lg:w-full xl:w-3/4 bg-gradient-to-r from-blue-600 via-blue-600 to-teal-500 py-4 px-8 rounded-lg shadow-lg shadow-outer">
                        <div class="w-full px-3 mb-8">
                            <label class="block text-white text-sm font-semibold" for="category">Category Name</label>
                            <input class="border-2 border-gray-800 rounded-lg text-center block w-full p-3 mt-2 placeholder-white text-white bg-transparent focus:shadow-xl focus:shadow-outer focus:border-white focus:outline-none" id="category" name="category" type="text" required placeholder="Category">
                        </div>

                        <div class="w-full px-3 mb-8">
                            <label class="block text-white text-sm font-semibold" for="parent">
                                Select Parent Category
                            </label>
                            <select name="parent" id="parent" class="appearance-none border-2 border-gray-800 rounded-lg text-center block w-full p-3 mt-2 placeholder-white text-white bg-transparent focus:shadow-xl focus:shadow-outer focus:border-white focus:outline-none">
                                <option value="{{ 0 }}">-------</option>
                                @if($parents)
                                    @foreach($parents as $parent)
                                            <option value="{{ $parent->id }}">{{ $parent->category_name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="w-full px-3 mb-8">
                            <input type="submit" value="Add" class="w-2/3 py-1 cursor-pointer shadow bg-green-500 hover:bg-green-400 focus:shadow-outline focus:outline-none text-white font-bold md:py-2 px-4 rounded">
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
        <div>
            <div class="flex flex-col list-none mx-auto sm:w-2/3">
                @foreach($parents as $parent)

                    <ul class="bg-teal-600">
                        {!! Form::open(['method'=>'POST','action'=>['App\Http\Controllers\AdminController@deleteCategory', $parent->id]]) !!}
                            <div class='form-group flex items-center'>
                                <span class="block my-auto w-full text-left pl-8 text-white">{{ $parent->category_name }}</span>
                                <a class="bg-gray-200 delete-category">
                                    <svg class="w-8 p-2 bg-red-400 hover:bg-red-600 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </a>
                                <input type="submit" class="hidden" onclick="return confirm('Are you sure you want to remove this category and all subcategories?')">
                            </div>
                        {!! Form::close() !!}
                    </ul>
                    @if($subcategories)
                        @foreach($subcategories as $category)
                            @if($parent->id == $category->parent_id)
                            <li>
                                {!! Form::open(['method'=>'POST','action'=>['App\Http\Controllers\AdminController@deleteCategory', $category->id]]) !!}
                                    <div class='form-group flex items-center'>
                                        <span class="block w-full p-2 text-center bg-gray-200">{{ $category->category_name }}</span>
                                        <a class="delete-category">
                                            <svg class="w-8 p-2 bg-red-400 hover:bg-red-600 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </a>
                                        <input type="submit" class="hidden" onclick="return confirm('Are you sure you want to remove this category?')">
                                    </div>
                                {!! Form::close() !!}
                            </li>
                            @endif
                        @endforeach
                    @endif

                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection

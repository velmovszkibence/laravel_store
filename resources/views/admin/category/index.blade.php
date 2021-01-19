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

                    <ul class="text-left pl-8 bg-teal-600 text-white">{{ $parent->category_name }}</ul>
                    @if($subcategories)
                        @foreach($subcategories as $category)
                            @if($parent->id == $category->parent_id)
                            <li>
                                <span class="block p-2 text-center bg-gray-200">{{ $category->category_name }}</span>
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

@extends('layouts.admin')

@section('content')
    <div class="h-screen flex flex-col md:ml-10 lg:ml-0">
        <h1 class="mx-auto pt-10">Account Settings</h1>
        <div class="m-auto">
            @if (session('update-success'))
                <div class="flash-msg bg-green-500 text-white border-4 border-green-500 rounded-lg mb-6 px-4">
                    {{ session('update-success') }}
                </div>
            @endif
            @if (session('update-fail'))
                <div class="flash-msg bg-red-500 text-white border-4 border-red-500 rounded-lg mb-6 px-4">
                    {{ session('update-fail') }}
                </div>
            @endif
            {!! Form::open(['method'=>'POST', 'action'=>'App\Http\Controllers\AdminController@updateAdmin']) !!}
            <div class="flex flex-col">
                <div class="w-full mb-16">
                    <label class="block text-gray-600 text-sm font-semibold pb-2" for="email">
                        Email
                    </label>
                    <input class="bg-gray-200 border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-orange" id="email" name="email" type="email" required placeholder="email@email.com">
                </div>
                <div class="w-full mb-4">
                    <label class="block text-gray-600 text-sm font-semibold pb-2" for="newpassword">
                        New Password
                    </label>
                    <input class="bg-gray-200 border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-orange" id="newpassword" name="newpassword" type="password" required placeholder="******">
                </div>
                <div class="w-full mb-4">
                    <label class="block text-gray-600 text-sm font-semibold pb-2" for="confirmpassword">
                        Confirm Password
                    </label>
                    <input class="bg-gray-200 border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-orange" id="confirmpassword" name="confirmpassword" type="password" required placeholder="******">
                </div>
                <div class="w-full mt-10 sm:mb-10 lg:mb-0">
                    <input type="submit" value="Change Password" class="w-full  border-2 shadow bg-white hover:border-4 hover:border-white hover:bg-orange hover:text-white focus:shadow-outline focus:outline-none text-orange font-bold py-2 px-4 rounded">
                </div>
            </div>
            {!! Form::close() !!}
        </h1>
    </div>
@endsection

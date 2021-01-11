<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <title>Admin Dashboard</title>
    @yield('styles')
</head>
<body>
    <div id="menu-btn" class="flex lg:hidden">
        <a class="ml-auto cursor-pointer">
            <svg class="w-12 p-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </a>
    </div>
    <div class="container-fluid flex flex-col lg:flex-row">
        @if (session('success_message'))
            <div class="flash-msg absolute flex" style="top: 40%; left: 40%">
                <div class="z-10 bg-green-500 text-white border-4 border-green-500 rounded-lg shadow-lg mb-6 px-4 md:p-6 2xl:p-10 2xl:text-2xl">
                    {{ session('success_message') }}
                </div>
            </div>
        @endif
        <div id="sidebar" class="hidden w-full lg:block lg:w-3/12 xl:w-2/12">
            @include('admin.includes.sidebar')
        </div>
        <div class="w-full sm:ml-auto lg:w-9/12 xl:w-10/12">
            @yield('content')
        </div>
    </div>
        <script src="{{ URL::to('js/admin.js') }}"></script>
    @yield('scripts')
</body>
</html>

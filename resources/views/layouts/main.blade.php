<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store</title>
    <link rel="stylesheet" href="/css/app.css">
    @yield('styles')
</head>
<body class="font-sans text-gray">
    <div id="menu-btn" class="flex lg:hidden">
        <a class="ml-auto cursor-pointer">
            <svg class="w-12 p-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </a>
    </div>
    @include('includes.navbar')
    @yield('showcase')
    @yield('content')
    @include('includes.footer')
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ '/js/custom.js' }}"></script>
    @yield('scripts')
</body>
</html>

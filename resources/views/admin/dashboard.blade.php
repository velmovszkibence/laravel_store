@extends('layouts.admin')

@section('content')

    <div class="h-screen flex flex-col">
        <div class="mx-auto w-3/4 pt-10 lg:w-full lg:px-20">

            <h1 class="mb-6">Overview</h1>

            <div class="grid grid-cols gap-8 sm:grid-cols-2 lg:grid-cols-4 w-full mb-16">
                <div class="h-32 border-2 border-gray-300 shadow">
                    <div class="flex justify-between py-2 px-4 mb-2">
                        <svg class="w-8 text-orange" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd" />
                        </svg>
                        <span>+24%</span>
                    </div>
                    <span class="py-2 px-4">$12220424</span>
                    <h4 class="py-2 px-4">Total Sales</h4>
                </div>
                <div class="h-32 border-2 border-gray-300 shadow">
                    <div class="flex justify-between py-2 px-4 mb-2">
                        <svg class="w-8 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z" />
                        </svg>
                        <span>+24%</span>
                    </div>
                    <span class="py-2 px-4">1443</span>
                    <h4 class="py-2 px-4">Total Visitors</h4>
                </div>
                <div class="h-32 border-2 border-gray-300 shadow">
                    <div class="flex justify-between py-2 px-4 mb-2">
                        <svg class="w-8 text-red-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z" />
                        </svg>
                        <span>+24%</span>
                    </div>
                    <span class="py-2 px-4">434</span>
                    <h4 class="py-2 px-4">Total Orders</h4>
                </div>
                <div class="h-32 border-2 border-gray-300 shadow">
                    <div class="flex justify-between py-2 px-4 mb-2">
                        <svg class="w-8 text-teal-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5 5a3 3 0 015-2.236A3 3 0 0114.83 6H16a2 2 0 110 4h-5V9a1 1 0 10-2 0v1H4a2 2 0 110-4h1.17C5.06 5.687 5 5.35 5 5zm4 1V5a1 1 0 10-1 1h1zm3 0a1 1 0 10-1-1v1h1z" clip-rule="evenodd" />
                            <path d="M9 11H3v5a2 2 0 002 2h4v-7zM11 18h4a2 2 0 002-2v-5h-6v7z" />
                        </svg>
                        <span>+24%</span>
                    </div>
                    <span class="py-2 px-4">1703</span>
                    <h4 class="py-2 px-4">Total Products</h4>
                </div>
            </div>

            <div class="w-full border-2 border-gray-300 shadow flex flex-col mb-4 md:justify-between">
                <h1 class="py-2 px-4 mb-4">Popular Products</h1>
                <div class="grid grid-cols gap-8 w-full mb-16 sm:grid-cols-2 lg:grid-cols-5">
                    @foreach($products as $product)
                        <div class="h-32 flex flex-col items-center text-center">
                            <img class="h-24 w-24" src="/images/{{ !empty($product->images[0]->image) ? $product->images[0]->image : '' }}">
                            <span class="py-2 px-4">{{ $product->name }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection

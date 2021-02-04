@extends('layouts.main')

@section( 'content')

<div class="w-4/5 mx-auto p-10 min-h-90 lg:w-full lg:px-0">
    <div class="mx-auto">
        @if ($errors->any())
            <div class="flex pb-10">
                <ul class="m-auto bg-red-500 text-white italic">
                    @foreach ($errors->all() as $error)
                        <li class="py-1 px-4">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <h1 class="text-xl text-center mb-4 border-b-2 pb-2 lg:pb-8">Checkout Options</h1>
        <div class="flex flex-col px-5 mt-24 mx-auto lg:flex-row lg:justify-evenly">
            <div class="flex flex-col lg:px-10">
                <div class="w-full max-w-sm mx-auto flex flex-col lg:h-full lg:justify-around">
                    <h2 class="max-w-sm font-bold text-gray-800 text-lg">New Customers</h2>
                    <p class="max-w-sm mt-2 mb-8">Proceed to checkout and you will have an
                        opportunity to create an account at the end if one
                        does not already exist for you.</p>
                    <a href="{{ route('checkout') }}" class="w-full max-w-sm shadow-lg bg-teal-600 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-center text-white font-bold mb-20 py-2 px-4 rounded">
                        Continue as Guest
                    </a>
                    <a class="bg-black text-white text-center text-xl py-1 rounded-lg italic font-extrabold" id="paypal-handle" href="{{ route('payment.handle') }}">PayPal</a>
                </div>
            </div>
            <div class="hidden lg:block lg:border-r-2"></div>
            <div class="flex flex-col pt-20 border-t-2 lg:border-0 lg:pt-0 lg:my-auto lg:px-10">
                <div class="max-w-sm mx-auto">
                <h2 class="max-w-sm font-bold text-gray-800 text-lg">Returning Customers</h2>
                <p class="max-w-sm mx-auto mt-2 mb-8">Sign in to speed up the checkout process and save payments to account.</p>
                </div>
                <form action="{{ route('user.signin') }}" method="post" class="w-full max-w-sm mx-auto">
                    <div class="lg:flex lg:items-center mb-6">
                        <div class="lg:w-1/3">
                            <label class="block font-bold lg:text-left mb-1 lg:mb-0 pr-4" for="inline-full-name">
                                Email
                            </label>
                        </div>
                        <div class="lg:w-2/3">
                            <input required type="text" name="email" id="email" class="bg-gray-200 shadow-sm border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-teal-400">
                        </div>
                    </div>
                    <div class="lg:flex lg:items-center mb-6">
                        <div class="lg:w-1/3">
                            <label class="block font-bold lg:text-left mb-1 lg:mb-0 pr-4" for="inline-password">
                                Password
                            </label>
                        </div>
                        <div class="lg:w-2/3">
                            <input required type="password" name="password" id="password" class="bg-gray-200 shadow-sm border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-teal-400" placeholder="******************">
                        </div>
                    </div>
                    <div class="agreement text-center py-5 sm:pl-5">
                        <span class="text-sm text-gray-600">By logging in, you agree to our <a href="#" class="text-gray-700 underline">Privacy Policy</a> and <a href="#" class="text-gray-700 underline">Terms of use</a></span>
                    </div>
                    <div class="w-100 lg:pt-4">
                        <div class="w-full">
                            <button type="submit" class="w-full shadow-lg bg-teal-600 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                                Sign In
                            </button>
                        </div>
                        <div class="w-full py-5 text-center">
                            <span class="text-sm text-gray-600">Not a Member? <a href="{{ route('user.signup') }}" class="text-gray-900 underline">Join Us</a></span>
                        </div>
                    {{ csrf_field() }}
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('scripts')
    <script src="https://www.paypal.com/sdk/js?client-id=AaiHAMMmdSZnJleLTeQHgyieONApT8kR1xycLLbr4sPQo8ffxMJ4bpJzNAg4yCb125y6gRgKGiuv54_P&disable-funding=credit,card"></script>
@endsection

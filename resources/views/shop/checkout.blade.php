@extends('layouts.main')

@section('styles')
<style>
    .StripeElement {
        box-sizing: border-box;
        height: 40px;
        padding: 10px 12px;
        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }

    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }

    .StripeElement--invalid {
        border-color: #fa755a;
    }

    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
</style>
@endsection

@section('content')
<div class="container mx-auto p-10">
    <div class="w-3/4 lg:w-2/4 mx-auto">
        <h1 class="text-xl text-center mb-4 border-b-2">Checkout</h1>
        <h4 class="mb-4">Your Total Payment: ${{ $total }}</h4>

        <form action="{{ route('checkout') }}" method="post" id="payment-form">

            <div class="flex flex-col md:flex-row -mx-3">
                <div class="w-full px-3 mb-8">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                        <i class="text-red-500">* </i>Full Name
                    </label>
                    <input value="{{ $user ? $user->name : null }}" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="name" name="name" type="text" placeholder="Full name" required>
                </div>
                <div class="w-full px-3 mb-8">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                        <i class="text-red-500">* </i>Email
                    </label>
                    <input value="{{ $user ? $user->email : null }}" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" name="email" type="email" placeholder="johndoe@gmail.com" required>
                </div>
            </div>

            <div class="flex flex-col md:flex-row -mx-3">
                <div class="w-full px-3 mb-8">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="phone">
                        <i class="text-red-500">* </i>Phone
                    </label>
                    <input value="{{ $user ? $user->phone : null }}" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="phone" name="phone" type="number" placeholder="1234567891" required>
                </div>
                <div class="w-full px-3 mb-8">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="address">
                        <i class="text-red-500">* </i>Address
                    </label>
                    <input value="{{ $user ? $user->address : null }}" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="address" name="address" type="text" placeholder="Street, house number" required>
                </div>
            </div>

            <div class="flex flex-col lg:flex-row -mx-3">
                <div class="w-full lg:w-2/3 px-3 mb-8">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="city">
                        <i class="text-red-500">* </i>City
                    </label>
                    <input value="{{ $user ? $user->city : null }}" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="city" name="city" type="text" placeholder="Chicago" required>
                </div>
                <div class="w-full lg:w-2/3 px-3 mb-8">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="country">
                        <i class="text-red-500">* </i>Country
                    </label>
                    <input value="{{ $user ? $user->country : null }}" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="country" name="country" type="text" placeholder="United States" required>
                </div>
                <div class="w-full lg:w-1/3 px-3 mb-8">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="zipcode">
                        <i class="text-red-500">* </i>Zip code
                    </label>
                    <input value="{{ $user ? $user->zip : null }}" class="block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="zipcode" name="zipcode" type="number" placeholder="12345" required>
                </div>
            </div>

            <div class="form-row mb-8">
              <label for="card-element">
                <i class="text-red-500">* </i>Credit or debit card
              </label>
              <div id="card-element" class="mt-2">
                <!-- A Stripe Element will be inserted here. -->
              </div>

              <!-- Used to display Element errors. -->
              <div id="card-errors" role="alert"></div>
            </div>
            <div class="flex">
                <button class="mx-auto shadow-md bg-teal-600 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">Place Order</button>
            </div>
            {{ csrf_field() }}
          </form>


    </div>
</div>

@endsection

@section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v3/"></script>
    <script type="text/javascript" src="{{ URL::to('js/checkout.js') }}"></script>
@endsection

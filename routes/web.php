<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\ProductController@index')->name('product.index');
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');

Route::get('/add-to-cart/{id}', 'App\Http\Controllers\ProductController@addToCart')->name('product.addtocart');
Route::get('/shopping-cart', 'App\Http\Controllers\ProductController@getShoppingCart')->name('product.shoppingcart');
Route::get('/increase/{id}', 'App\Http\Controllers\ProductController@increaseNumberOfItems')->name('product.increase');
Route::get('/decrease/{id}', 'App\Http\Controllers\ProductController@decreaseNumberOfItems')->name('product.decrease');
Route::get('/delete/{id}', 'App\Http\Controllers\ProductController@deleteItemFromCart')->name('product.delete');

Route::get('/checkout-option', function(){
    return view('shop.checkout-option');
})->name('checkout.option');

Route::get('/checkout', 'App\Http\Controllers\ProductController@getCheckout')->name('checkout');
Route::post('/checkout', 'App\Http\Controllers\ProductController@postCheckout')->name('checkout');

Route::get('payment', 'App\Http\Controllers\PayPalController@payment')->name('payment.handle');
Route::get('cancel', 'App\Http\Controllers\PayPalController@cancel')->name('payment.cancel');
Route::get('payment/success', 'App\Http\Controllers\PayPalController@success')->name('payment.success');

Route::group(['prefix' => 'user'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/signup', 'App\Http\Controllers\UserController@getSignup')->name('user.signup');
        Route::post('/signup', 'App\Http\Controllers\UserController@postSignup')->name('user.signup');
        Route::get('/signin', 'App\Http\Controllers\UserController@getSignin')->name('user.signin');
        Route::post('/signin', 'App\Http\Controllers\UserController@postSignin')->name('user.signin');
    });

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/profile', 'App\Http\Controllers\UserController@getProfile')->name('user.profile');
        Route::get('/logout', 'App\Http\Controllers\UserController@logout')->name('user.logout');
    });

});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/dashboard', 'App\Http\Controllers\AdminController@getDashboard')->name('admin.dashboard');
    Route::get('/product', 'App\Http\Controllers\AdminController@getProductPage')->name('admin.product.index');
    Route::get('/account', 'App\Http\Controllers\AdminController@getAccountPage')->name('admin.account.index');
    Route::post('/account', 'App\Http\Controllers\AdminController@updateAdmin');
    Route::get('/help', 'App\Http\Controllers\AdminController@getHelpPage')->name('admin.help.index');
    Route::get('/order', 'App\Http\Controllers\AdminController@getOrderPage')->name('admin.order.index');
    Route::get('/order/{id}', 'App\Http\Controllers\AdminController@showOrder')->name('admin.order.show');
    Route::patch('/order-status', 'App\Http\Controllers\AdminController@updateOrderStatus');
    Route::get('/statistic', 'App\Http\Controllers\AdminController@getStatisticPage')->name('admin.statistic.index');
    Route::get('/stock', 'App\Http\Controllers\AdminController@getStockPage')->name('admin.stock.index');
    Route::post('/store-product', 'App\Http\Controllers\AdminController@storeProduct');
    Route::get('/edit-product/{id}', 'App\Http\Controllers\AdminController@getEditProductPage')->name('admin.product.edit');
    Route::patch('/edit-product/{id}', 'App\Http\Controllers\AdminController@updateProduct');
    Route::patch('/activate-product', 'App\Http\Controllers\AdminController@activateProduct');
    Route::post('/destroy-product/{id}', 'App\Http\Controllers\AdminController@destroyProduct');
    Route::get('/category', 'App\Http\Controllers\AdminController@getCategoryPage')->name('admin.category.index');
    Route::post('/category', 'App\Http\Controllers\AdminController@storeCategory');
    Route::post('/delete-category/{id}', 'App\Http\Controllers\AdminController@deleteCategory')->name('admin.category.delete');

});

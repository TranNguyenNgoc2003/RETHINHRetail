<?php

use App\Http\Controllers\Auth\LoginAndRegisterController;
use App\Http\Controllers\Auth\SocialLogin;
use App\Http\Controllers\Auth\SocialLoginCallback;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShippingController;
use Illuminate\Support\Facades\Route;

Route::controller(LoginAndRegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/registerAuth', 'registerAuth')->name('registerAuth');
    Route::get('/login', 'login')->name('login');
    Route::post('/loginAuth', 'loginAuth')->name('loginAuth');
    Route::get('/home', 'home')->name('home');
    Route::post('/logout', 'logout')->name('logout');
});

Route::prefix('social')->group(function () {
    Route::get('{provider}', [SocialLogin::class, 'redirectToProvider'])->name('social.login');
    Route::get('{provider}/callback', [SocialLoginCallback::class, 'handleProviderCallback']);
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/home',  'getProduct')->name('home');
    Route::get('/product/{id}',  'details')->name('product.detail');
    Route::post('/addToCart',  'addToCart')->name('addToCart');
    Route::get('/cart',  'cart')->name('cart');
    Route::post('/cart/update', 'updateCart')->name('cart.update');
    Route::get('/checkout',  'checkout')->name('checkout');
});

Route::controller(ShippingController::class)->group(function () {
    Route::get('/shipping/index',  'index')->name('shipping.index');
    Route::get('/shipping/create', 'create')->name('shipping.create');
    Route::post('/shipping/addDelivery', 'addDelivery')->name('shipping.addDelivery');
    Route::post('/shipping/select', 'selectAddress')->name('shipping.select');
    Route::get('/shipping/{id}/edit', 'edit')->name('shipping.edit');
    Route::put('/shipping/{id}', 'update')->name('shipping.update');
    Route::get('/shipping/{id}/delete', 'delete')->name('shipping.delete');
});

Route::controller(CouponController::class)->group(function () {
    Route::get('/coupon','coupon')->name('coupon');
});
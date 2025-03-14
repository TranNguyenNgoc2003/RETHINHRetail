<?php

use App\Http\Controllers\Auth\LoginAndRegisterController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\SocialLogin;
use App\Http\Controllers\Auth\SocialLoginCallback;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomerServiceController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShippingController;
use Illuminate\Support\Facades\Route;

Route::controller(LoginAndRegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/registerAuth', 'registerAuth')->name('registerAuth');
    Route::get('/login', 'login')->name('login');
    Route::post('/loginAuth', 'loginAuth')->name('loginAuth');
    Route::post('/logout', 'logout')->name('logout');
});

Route::prefix('social')->group(function () {
    Route::get('{provider}', [SocialLogin::class, 'redirectToProvider'])->name('social.login');
    Route::get('{provider}/callback', [SocialLoginCallback::class, 'handleProviderCallback']);
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/home',  'home')->name('home');
    Route::get('/product/{id}',  'details')->name('product.detail');
});

Route::controller(CartController::class)->group(function () {
    Route::get('/cart',  'cart')->name('cart');
    Route::post('/addToCart',  'addToCart')->name('addToCart');
    Route::post('/cart/update', 'updateCart')->name('cart.update');
    Route::post('/cart/coupon', 'applyCoupon')->name('cart.coupon');
});

Route::controller(OrderController::class)->group(function () {
    Route::get('/checkout', 'checkout')->name('checkout');
    Route::post('/checkout/{orderId}/confirm', 'applyOrder')->name('checkout.confirm');
    Route::get('/checkout/{orderId}', 'showCheckout')->name('checkout.show');
    Route::get('/complete/{orderId}', 'complete')->name('complete');
    Route::get('/history', 'history')->name('history');
    Route::get('/reorder/{orderId}',  'reorder')->name('order.reorder');
});

Route::controller(ShippingController::class)->group(function () {
    Route::get('/shipping/{orderId}/index', 'index')->name('shipping.index');
    Route::get('/shipping/{orderId}/create', 'create')->name('shipping.create');
    Route::post('/shipping/{orderId}/addDelivery', 'addDelivery')->name('shipping.addDelivery');
    Route::post('/shipping/{orderId}/select', 'selectAddress')->name('shipping.select');
    Route::get('/shipping/{orderId}/{id}/edit', 'edit')->name('shipping.edit');
    Route::put('/shipping/{orderId}/{id}', 'update')->name('shipping.update');
    Route::get('/shipping/{orderId}/{id}/delete', 'delete')->name('shipping.delete');
});

Route::controller(CouponController::class)->group(function () {
    Route::get('/coupon', 'coupon')->name('coupon');
});

Route::controller(CustomerServiceController::class)->group(function () {
    Route::get('/about', 'about')->name('about');
    Route::post('/customer-service', 'addQuestion')->name('customer_service.addQuestion');
});

Route::controller(ProfileController::class)->group(function () {
    Route::get('/auth/profile', 'profile')->name('auth.profile');
    Route::post('/profile/update', 'updateProfile')->name('profile.update');
});
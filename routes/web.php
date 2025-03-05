<?php

use App\Http\Controllers\Auth\LoginAndRegisterController;
use App\Http\Controllers\Auth\SocialLogin;
use App\Http\Controllers\Auth\SocialLoginCallback;
use App\Http\Controllers\ProductController;
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
});

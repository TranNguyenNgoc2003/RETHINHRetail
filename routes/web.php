<?php

use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Auth\SocialLogin;
use App\Http\Controllers\Auth\SocialLoginCallback;
use Illuminate\Support\Facades\Route;

Route::controller(LoginRegisterController::class)->group(function () {
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

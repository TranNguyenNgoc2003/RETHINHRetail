<?php

use App\Http\Controllers\Auth\LoginAndRegisterController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\SocialLogin;
use App\Http\Controllers\Auth\SocialLoginCallback;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomerServiceController;
use App\Http\Controllers\Manager\AccountController;
use App\Http\Controllers\Manager\ManageController;
use App\Http\Controllers\Manager\ManagerOrderController;
use App\Http\Controllers\Manager\ProductAndInventoryController;
use App\Http\Controllers\Manager\RequestsController;
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
    Route::get('{provider}/callback', [SocialLoginCallBack::class, 'handleProviderCallback']);
});

Route::controller(ProductController::class)->group(function () {
    Route::get('/home', 'home')->name('home');
    Route::get('/product/{id}', 'details')->name('product.detail');
    Route::get('/category/{category}', 'category')->name('category');
    Route::get('/search', 'search')->name('search');
});

Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'cart')->name('cart');
    Route::post('/addToCart', 'addToCart')->name('addToCart');
    Route::post('/cart/update', 'updateCart')->name('cart.update');
    Route::post('/cart/coupon', 'applyCoupon')->name('cart.coupon');
});

Route::controller(OrderController::class)->group(function () {
    Route::get('/checkout', 'checkout')->name('checkout');
    Route::post('/checkout/{orderId}/confirm', 'applyOrder')->name('checkout.confirm');
    Route::get('/checkout/{orderId}', 'showCheckout')->name('checkout.show');
    Route::get('/complete/{orderId}', 'complete')->name('complete');
    Route::get('/history', 'history')->name('history');
    Route::get('/reorder/{orderId}', 'reorder')->name('order.reorder');
    Route::post('/checkout/vnpay/{orderId}', 'createVnpayPayment')->name('checkout.vnpay');
    Route::get('/vnpay-return', 'vnpayReturn')->name('vnpay.return');
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
    Route::post('/profile/delete/{id}', 'deleteProfile')->name('profile.delete');
    Route::get('/auth/address', 'address')->name('auth.address');
    Route::get('/address/newAddress', 'newAddress')->name('address.newAddress');
    Route::post('/address/add', 'addAddress')->name('address.add');
    Route::get('/address/{id}/edit', 'editAddress')->name('address.editAddress');
    Route::put('/address/update/{id}', 'updateAddress')->name('address.update');
    Route::get('/address/delete/{id}', 'deleteAddress')->name('address.delete');
});

Route::controller(AccountController::class)->group(function () {
    Route::get('/manager/login', 'login')->name('manager.login');
    Route::post('/manager/loginAuth', 'loginAuth')->name('manager.loginAuth');
    Route::post('/manager/logout', 'logout')->name('manager.logout');
});

Route::controller(ManageController::class)->group(function () {
    Route::get('/manager', 'dashboard')->name('manager');
    Route::get('/manager/users', 'getUsers')->name('manager.users');
    Route::get('/manager/admins', 'getAdmins')->name('manager.admins');
    Route::get('/manager/infoEdit/{id}', 'infoEdit')->name('manager.infoEdit');
    Route::post('/manager/update/{id}', 'updateUser')->name('manager.update');
    Route::get('/manager/create', 'create')->name('manager.create');
    Route::post('/manager/createUser', 'createUser')->name('manager.createUser');
});

Route::controller(ManagerOrderController::class)->group(function () {
    Route::get('/manager/order/{id}', 'orderDetails')->name('manager.orderDetail');
    Route::post('/manager/order/updateStatus/{id}', 'updateStatus')->name('manager.updateStatus');
    Route::get('/manager/cancelledOrders', 'cancelled')->name('manager.cancelledOrders');
    Route::get('/manager/deliveredOrders', 'delivere')->name('manager.deliveredOrders');
    Route::get('/manager/processingOrders', 'processing')->name('manager.processingOrders');
});

Route::controller(ProductAndInventoryController::class)->group(function () {
    Route::get('/manager/allProduct', 'allProduct')->name('manager.allProduct');
    Route::get('/manager/editProduct/{id}', 'editProduct')->name('manager.editProduct');
    Route::post('/manager/updateProduct/{id}', 'updateProduct')->name('manager.updateProduct');
    Route::get('/manager/deleteImage/{id}', 'deleteImage')->name('manager.deleteImage');
    Route::get('/manager/newProduct', 'newProduct')->name('manager.newProduct');
    Route::post('/manager/addProduct', 'addProduct')->name('manager.addProduct');
});

Route::controller(RequestsController::class)->group(function () {
    Route::get('/manager/processedRequests', 'processed')->name('manager.processedRequests');
    Route::get('/manager/pendingRequests', 'pending')->name('manager.pendingRequests');
    Route::post('manager.updateService/{id}', 'updateService')->name('manager.updateService');

});

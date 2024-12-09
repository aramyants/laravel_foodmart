<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\CustomerLoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CheckoutController;
use Filament\Pages\Auth\Register;

Route::get('/', [HomeController::class, 'index']);
Route::get('/shop', [ShopController::class, 'index']);

Route::get('/about', [HomeController::class, 'showAbout']);
Route::get('/contact', [HomeController::class, 'showContact']);


Route::get('login', [CustomerLoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [CustomerLoginController::class, 'login']);

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('customer.login');
Route::post('register', [RegisterController::class, 'register']);
Route::get('logout', [CustomerLoginController::class, 'logout'])->name('customer.logout');



Route::middleware('auth:customer')->group(function () {
    Route::get('/cart/remove/{cartId}', [ProductController::class, 'removeFromCart']);

    Route::get('/account', [CustomerController::class, 'account']);
    Route::get('/product/{product}', [ProductController::class, 'show']);
    Route::get('/product/{product}/add-to-cart', [ProductController::class, 'addToCart']);
    Route::get('/product/{product}/checkout', [ProductController::class, 'addToCart']);

    Route::get('/checkout', [CheckoutController::class, 'index']);
    Route::post('/pay', [CheckoutController::class, 'store']);
    Route::get('/about', [HomeController::class, 'showAbout']);

});

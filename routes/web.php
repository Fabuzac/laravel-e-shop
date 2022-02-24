<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

// GUEST - USER :
// HOME
Route::get('/', [HomeController::class, 'index'])->name('home');

// Main pages
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/shop', [HomeController::class, 'shop'])->name('shop.index');
Route::get('/shop/single-product', [HomeController::class, 'shopShow'])->name('shop.show');

// Cart
Route::get('/cart', [HomeController::class, 'cart'])->name('cart.index');

// Checkout
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout.index');

// Orders
Route::get('/orders', [HomeController::class, 'orders'])->name('orders');



//========
// ADMIN =
//========
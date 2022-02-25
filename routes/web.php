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

// GUEST - USER ==============================================
// HOME
Route::get('/', [HomeController::class, 'index'])->name('home');

// Main pages
Route::get('/shop', [HomeController::class, 'shop'])->name('shop.index');
Route::get('/shop/single-product', [HomeController::class, 'shopShow'])->name('shop.show');
Route::get('/category', [HomeController::class, 'category'])->name('category');
Route::get('/product', [HomeController::class, 'product'])->name('product');

Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/elements', [HomeController::class, 'elements'])->name('elements');

Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/single-blog', [HomeController::class, 'singleBlog'])->name('single-blog');

Route::get('/cart', [HomeController::class, 'cart'])->name('cart.index');
Route::get('/checkout', [HomeController::class, 'checkout'])->name('checkout.index');
Route::get('/orders', [HomeController::class, 'orders'])->name('orders');
Route::get('/confirmation', [HomeController::class, 'confirmation'])->name('confirmation');
Route::get('/thanks', [HomeController::class, 'thanks'])->name('thanks');
Route::get('/tracking', [HomeController::class, 'tracking'])->name('tracking');

Route::get('/login', [HomeController::class, 'login'])->name('login');


//========
// ADMIN =========================================================
//========
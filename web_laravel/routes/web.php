<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

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

// Route::get('/', function () {
//     return view('ecommerce/landing');
// });

Route::get('/', [ProductController::class, 'index'])->name('product.index');
Route::get('shop', [ProductController::class, 'shop'])->name('product.shop');
Route::get('cart', [ProductController::class, 'cart'])->name('product.cart');
Route::get('/shop/{id}', [ProductController::class, 'addProductToCart'])->name('addProduct.to.cart');

Route::get('/order/detail/{id}', [OrderController::class, 'detail'])->name('order.detail');
Route::post('/order/{total_price}', [OrderController::class, 'addOrder'])->name('order.addOrder');

Route::delete('/delete-cart-product', [ProductController::class, 'deleteProductFromCart'])->name('delete.cart.product');
Route::resource('product', ProductController::class);
Route::resource('order', OrderController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

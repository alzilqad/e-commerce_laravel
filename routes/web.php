<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\accessController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\clientModule\categoryController;
use App\Http\Controllers\clientModule\subcategoryController;
use App\Http\Controllers\clientModule\productController;
use App\Http\Controllers\clientModule\cartController;
use App\Http\Controllers\clientModule\userController;

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

Route::get('/', [homeController::class, 'index'])->name('home.index');
Route::get('/register', [accessController::class, 'showRegisterPage'])->name('register.index');

Route::get('/category', [categoryController::class, 'index'])->name('category.index');
Route::get('/subcategory', [subcategoryController::class, 'index'])->name('subcat.index');
Route::get('/product', [productController::class, 'index'])->name('product.index');
Route::get('/cart', [cartController::class, 'index'])->name('cart.index');

Route::get('/user', [userController::class, 'profile'])->name('user.profile');
Route::get('/order', [userController::class, 'order'])->name('user.order');
Route::get('/orders', [userController::class, 'orders'])->name('user.orders');
Route::get('/wishlist', [userController::class, 'wishlist'])->name('user.wishlist');

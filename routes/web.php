<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\accessController;
use App\Http\Controllers\clientModule\homeController;
use App\Http\Controllers\clientModule\productController;
use App\Http\Controllers\clientModule\cartController;
use App\Http\Controllers\clientModule\checkoutController;
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


//default pages for all users
Route::get('/', [homeController::class, 'index'])->name('home.index');
Route::get('/new', [homeController::class, 'newArrivalPage'])->name('category.new');
Route::get('/offer', [homeController::class, 'offerPage'])->name('category.offer');
Route::get('/category', [homeController::class, 'multipleCategoryPage'])->name('category.multiple');
Route::get('/shop/{category}', [homeController::class, 'singularCategoryPage'])->name('category.singular');
Route::get('/shop/{category}/{subCategory}', [homeController::class, 'subCategoryPageLevel1'])->name('category.sub');
Route::get('/shop/{category}/{subCategory}/{subCategory2}', [homeController::class, 'subCategoryPageLevel2'])->name('category.sub2');
Route::get('/shop/{category}/{subCategory}/{subCategory2}/{subCategory3}', [homeController::class, 'subCategoryPageLevel3'])->name('category.sub3');
Route::get('/product/{id}/{product}', [productController::class, 'index'])->name('product.index');


//search
Route::get('/search', [productController::class, 'searchProductView'])->name('search.index');
//ajax sort and order to filter products
Route::get('/search/sort', [productController::class, 'sortProductView']);
Route::get('/search/order', [productController::class, 'orderProductView']);


//cart
Route::get('/cart', [cartController::class, 'index'])->name('cart.index');
//ajax crud on cart
Route::get('/cart/create', [cartController::class, 'addCartProduct']);
Route::get('/cart/update', [cartController::class, 'modifyCartProduct']);
Route::get('/cart/delete', [cartController::class, 'removeCartProduct']);


//checkout
Route::get('/checkout-delivery', [checkoutController::class, 'delivery'])->name('checkout.delivery');
Route::get('/checkout-address', [checkoutController::class, 'address'])->name('checkout.address');
Route::get('/checkout-payment', [checkoutController::class, 'payment'])->name('checkout.payment');
Route::get('/checkout-review', [checkoutController::class, 'review'])->name('checkout.review');

Route::get('/checkout/getdistrict', [checkoutController::class, 'getDistrictArray']);

//access
Route::get('/registration', [accessController::class, 'showRegisterPage'])->name('register.index');
Route::get('/login', [accessController::class, 'showLoginPage'])->name('login.index');
Route::get('/login/user', [accessController::class, 'loginUser'])->name('login.user');
Route::get('/logout/user', [accessController::class, 'logoutUser'])->name('logout.user');

//user
Route::get('/user', [userController::class, 'profile'])->name('user.profile');
Route::get('/order', [userController::class, 'order'])->name('user.order');
Route::get('/orders', [userController::class, 'orders'])->name('user.orders');
Route::get('/wishlist', [userController::class, 'wishlist'])->name('user.wishlist');

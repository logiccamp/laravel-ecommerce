<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\CartsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\CheckoutsController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

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
Route::post('/loginMain', [AccountController::class, 'loginMain'])->name("loginMain");

Route::get('/', [AppController::class, 'index'])->name('home');
Route::get('/product/{slug}', [ProductsController::class, 'show'])->name('product');
Route::get('/shop', [ProductsController::class, 'index'])->name('shop');
Route::get('/categories/{category_slug}', [CategoriesController::class, 'index'])->name('shop');
Route::get('/cart', [AppController::class, 'cart'])->name('cart');
Route::get('/contact', [AppController::class, 'contact'])->name('contact');
Route::get('/about', [AppController::class, 'about'])->name('about');
Route::get('/checkout', [AppController::class, 'checkout'])->name('checkout');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});




// bkend vue
Route::get("/getcart", [CartsController::class, 'count']);

Route::post("/signupbk", [AccountController::class, 'signup']);
Route::post("/loginbk", [AccountController::class, 'login']);


// cart
Route::post("/addcartbk", [CartsController::class, 'store']);
Route::get('/cartbk', [CartsController::class, 'index'])->name('cartbk');
Route::get('/cartbk/r/{cartId}', [CartsController::class, 'destroy'])->name('cartbkr');
Route::get('/cartbk/u/{cartId}/{action}', [CartsController::class, 'update'])->name('cartbkr');

// shop
Route::get('/shopbk', [ProductsController::class, 'getAll'])->name('shopbk');
Route::get('/categoriesbk', [CategoriesController::class, 'getAll'])->name('categoriesbk');
Route::get('/checkoutbk', [CheckoutsController::class, 'index'])->name('checkoutbk');

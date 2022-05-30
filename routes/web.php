<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\CartDetailController;
use App\Http\Controllers\AdminController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/login', function () {
//     return view('pages.login');
// })->name('login');
Route::get('/signup', function () {
    return view('pages.signup');
})->name('signup');

Route::get('/menu', [MenuController::class, 'index'])->name('menu');

Route::get('/about', function () {
    return view('pages.about', ['active' => 2]);
})->name('about');

 

Route::get('/product-detail/{id}', [ProductController::class, 'show'])->name('product-detail');

Route::get('/promo', [PromotionController::class, 'index'])->name('promo');

Route::get('/cart', [CartController::class, 'index'])->middleware('auth')->name('cart');
Route::post('/addproduct', [CartDetailController::class, 'store'])->name('product.add');
// Route::post('/cart-details/{proID}', [CartDetailController::class,'store'])->name('cart-details');
require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
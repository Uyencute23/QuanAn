<?php

use App\Events\OrderEvent;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\CartDetailController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckOutController;
use App\Http\Controllers\CustomerOrder;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailController;
use App\Http\Controllers\OrderTrackingController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;
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
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    Lfm::routes();
});
Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/login', function () {
//     return view('pages.login');
// })->name('login');
Route::get('/signup', function () {
    return view('pages.signup');
})->name('signup');


Route::get('/profile', function () {
    return view('admin.pages.full-profile');
})->name('profile');

Route::get('/menu', [MenuController::class, 'index'])->name('menu');

Route::get('/about', function () {
    return view('pages.about', ['active' => 2]);
})->name('about');

 
Route::get('/product-detail/{id}', [ProductController::class, 'show'])->name('product-detail');

Route::get('/promo', [PromotionController::class, 'index'])->name('promo');

Route::get('/cart', [CartController::class, 'index'])->middleware(['auth','customer'])->middleware(['auth','customer'])->name('cart');
Route::get('/cartdetail/{id}', [CartDetailController::class, 'destroy'])->middleware(['auth','customer'])->name('cartdetail.del');
Route::post('/updatecart', [CartDetailController::class, 'update'])->middleware(['auth','customer'])->name('cartdetail.update');
// Route::get('/checkout',[OrderDetailController::class,'index'])->name('checkout');
Route::get('/checkout', [OrderDetailController::class,'index'])->middleware(['auth','customer'])->name('checkout');
Route::post('/addproduct', [CartDetailController::class, 'store'])->middleware(['auth','customer'])->name('product.add');
Route::post('/rating', [RatingController::class, 'store'])->middleware(['auth','customer'])->name('product.rating');
// Route::post('/cart-details/{proID}', [CartDetailController::class,'store'])->name('cart-details');
Route::post('/create-order', [CheckOutController::class, 'store'])->middleware(['auth','customer'])->name('checkout.create');
Route::get('/news', [PostController::class, 'index'])->middleware(['auth','customer'])->name('news');
Route::get('/customerorders',[CustomerOrder::class,'index'])->middleware(['auth','customer'])->name('customerorders.index');
Route::get('/order-detail/{id}',[OrderTrackingController::class,'index'])->middleware(['auth','customer'])->name('order-detail');

Route::get('/pusher/{message}',[OrderController::class,'sendMessage'])->name('pusher');
require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';
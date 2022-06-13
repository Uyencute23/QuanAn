<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
// Route::get('/dashboard',  function () {
//     return view('admin.pages.dashboard');
// })->name('dashboard');
Route::get('/dashboard',[AdminController::class , 'index'])->middleware(['auth','admin'])->name('dashboard');
// Route::get('/me',  function () {
//     return view('admin.pages.me');
// })->name('dashboard');
Route::resource('user',UsersController::class)->middleware(['auth','admin']);
Route::resource('staff',StaffController::class)->middleware(['auth','admin']);
Route::resource('product',ProductController::class)->middleware(['auth','admin']);
Route::resource('customer',CustomerController::class)->middleware(['auth','admin']);
Route::resource('order',OrderController::class)->middleware(['auth','admin']);
Route::resource('product-type',ProductTypeController::class)->middleware(['auth','admin']);


?>

<?php

use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
Route::get('/dashboard',  function () {
    return view('admin.pages.dashboard');
})->name('dashboard');

Route::get('/me',  function () {
    return view('admin.pages.me');
})->name('dashboard');
Route::resource('user',UsersController::class)
?>

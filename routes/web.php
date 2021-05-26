<?php

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

Route::get('/login', [\App\Http\Controllers\LoginController::class,'index'])->name('login.form');

Route::post('/login', [\App\Http\Controllers\LoginController::class,'login'])->name('login');

Route::middleware('auth')->group(static function() {
    Route::any('logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');

    Route::get('',[\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('dashboard',[\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::resource('products', \App\Http\Controllers\ProductController::class);
    Route::resource('licences', \App\Http\Controllers\LicenceController::class);
    Route::resource('clients', \App\Http\Controllers\ClientController::class);
});


Route::get('artisan', function (){
    \Illuminate\Support\Facades\Artisan::call("migrate:fresh --seed");
    return "done";
});


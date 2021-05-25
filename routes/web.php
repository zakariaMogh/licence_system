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

Route::get('/', function () {
    return view('layouts.app');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::view('/users','users.index')->name('users.index');
Route::view('/products','products.index')->name('products.index');
Route::view('/clients','clients.index')->name('clients.index');
Route::view('/licences','licences.index')->name('licences.index');

Route::resource('users', \App\Http\Controllers\UserController::class);

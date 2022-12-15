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
    return view('dashboard', ["title" => "Dashboard"]);
});

Route::resource('/category', \App\Http\Controllers\CategoryController::class);
Route::resource('/barang', \App\Http\Controllers\BarangController::class);
Route::resource('/item', \App\Http\Controllers\ItemController::class);

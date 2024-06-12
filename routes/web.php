<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/template', function () {
//     return view('layouts.master');
// });

// Category Resourse Route
// Route::resource('/categories', CategoryController::class);

// Authincation for security
Route::middleware(['auth'])->group(function () {
    // Category Resourse Route
    Route::resource('/categories', CategoryController::class);

    // Brand Resourse Route
    Route::resource('/brands', BrandController::class);

     // Size Resourse Route
     Route::resource('/sizes', SizeController::class);

    //  Product Resourse Route
    Route::resource('products', ProductController::class);
});



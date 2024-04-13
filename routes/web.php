<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/',HomeController::class)->name('home');
Route::get('/products',[ProductsController::class,'index'])->name('products');
Route::get('/product/{id}',[ProductsController::class,'show'])->name('product_details');
<?php

use App\Http\Controllers\ColorController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
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
    return view('welcome');
});

//all product
Route::get('/add-product', [ProductController::class, 'allProduct'])->name('addnewProduct');
Route::get('/single-product/{id}', [ProductController::class, 'singleProduct'])->name('singleProduct');

Route::get('/single-product-color/{id}', [ProductController::class, 'singleProductColor'])->name('singleProductColor');
Route::get('/single-product-size/{id}', [ProductController::class, 'singleProductSize'])->name('singleProductSize');

Route::post('/product-veriation',[ProductController::class, 'addProductWithVariation'])->name('addProduct');
Route::post('/product-check-variation',[ProductController::class, 'addProductWithVariationCheck'])->name('addProductCheck');

Route::get('/check-add',[ProductController::class, 'allProduct']);
Route::post('/addmorePost', [ProductController::class, 'check'])->name('addmorePost');


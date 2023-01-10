<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

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
Route::get('/shop1', function () {
    return view('shop.layout.master');
});


Route::get('/', function () {
    return view('admin.layout.master');
});
Route::prefix('categories')->group(function () {
    Route::get('/index', [CategoryController::class,'index'])->name('categories.index');
    Route::get('/create', [CategoryController::class,'create'])->name('categories.create');
    Route::post('/store', [CategoryController::class,'store'])->name('categories.store');
    Route::get('/edit/{id}', [CategoryController::class,'edit'])->name('categories.edit');
    Route::put('/update/{id}', [CategoryController::class,'update'])->name('categories.update');
    Route::delete('/delete/{id}', [CategoryController::class,'delete'])->name('categories.delete');
});
Route::prefix('product')->group(function () {
    Route::get('/index', [ProductController::class,'index'])->name('product.index');
    Route::get('/create', [ProductController::class,'create'])->name('product.create');
    Route::post('/store', [ProductController::class,'store'])->name('product.store');
    Route::get('/edit/{id}', [ProductController::class,'edit'])->name('product.edit');
    Route::put('/update/{id}', [ProductController::class,'update'])->name('product.update');
    Route::delete('/delete/{id}', [ProductController::class,'delete'])->name('product.delete');
});


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;

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
// Route::get('/shop1', function () {
//     return view('shop.layout.master');
// });
//xem chi tiết
Route::get('/showProduct/{id}', [ShopController::class, 'show'])->name('shop.showProduct');
// thêm giỏ hàng
Route::get('/store/{id}', [ShopController::class, 'store'])->name('shop.store');
//viwe giỏ hàng

Route::get('/cart', [ShopController::class, 'Cart'])->name('cart.index');

//xóa giỏ hàng
Route::get('/remove-from-cart/{id}', [ShopController::class, 'remove'])->name('remove.from.cart');

Route::get('/home', [ShopController::class,'index'])->name('shop.index');


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


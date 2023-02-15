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
    return view('admin.home');
})->name('home');
//thêm danh mục
Route::prefix('categories')->group(function () {
    Route::get('categories/search', [CategoryController::class, 'search'])->name('categories.search');
    Route::get('/index', [CategoryController::class,'index'])->name('categories.index');
    Route::get('/create', [CategoryController::class,'create'])->name('categories.create');
    Route::post('/store', [CategoryController::class,'store'])->name('categories.store');
    Route::get('/edit/{id}', [CategoryController::class,'edit'])->name('categories.edit');
    Route::put('/update/{id}', [CategoryController::class,'update'])->name('categories.update');
    Route::get('/destroy/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    // xóa mềm
    Route::put('/softdeletes/{id}', [CategoryController::class, 'softdeletes'])->name('categories.softdeletes');
    Route::get('/trash', [CategoryController::class, 'trash'])->name('categories.trash');
    Route::put('/restoredelete/{id}', [CategoryController::class, 'restoredelete'])->name('categories.restoredelete');
//
Route::get('/user/{id}', [CategoryController::class, 'edit'])->name('category_edit');
Route::put('/user/{id}', [CategoryController::class, 'update'])->name('category.update');
});
// thêm sản phẩm
Route::prefix('product')->group(function () {
    Route::get('/index', [ProductController::class,'index'])->name('product.index');
    Route::get('/create', [ProductController::class,'create'])->name('product.create');
    Route::post('/store', [ProductController::class,'store'])->name('product.store');
    Route::get('/edit/{id}', [ProductController::class,'edit'])->name('product.edit');
    Route::put('/update/{id}', [ProductController::class,'update'])->name('product.update');
    Route::delete('/delete/{id}', [ProductController::class,'delete'])->name('product.delete');

    Route::put('/softdeletes/{id}', [ProductController::class, 'softdeletes'])->name('product.softdeletes');
        Route::get('/trash', [ProductController::class, 'trash'])->name('product.trash');
        Route::put('/restoredelete/{id}', [ProductController::class, 'restoredelete'])->name('product.restoredelete');
        Route::get('destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

});


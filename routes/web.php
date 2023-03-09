<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UsersController;

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

// Route::prefix('home')->group(function () {
//     Route::get('/', [ShopController::class, 'index'])->name('shop.index');
// });
//
// đăng nhập đăng kí
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin'])->name('postlogin');

Route::prefix('/')->middleware(['auth', 'prevent-back-history'])->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', function () {
        return view('admin.home');
    })->name('home');
    //thêm danh mục
    Route::prefix('categories')->group(function () {
        Route::get('categories/search', [CategoryController::class, 'search'])->name('categories.search');
        Route::get('/index', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/update/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::get('/destroy/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
        // xóa mềm
        Route::put('/softdeletes/{id}', [CategoryController::class, 'softdeletes'])->name('categories.softdeletes');
        Route::get('/trash', [CategoryController::class, 'trash'])->name('categories.trash');
        Route::put('/restoredelete/{id}', [CategoryController::class, 'restoredelete'])->name('categories.restoredelete');
    });
    // thêm sản phẩm
    Route::prefix('product')->group(function () {
        Route::get('/index', [ProductController::class, 'index'])->name('product.index');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::put('/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');

        Route::put('/softdeletes/{id}', [ProductController::class, 'softdeletes'])->name('product.softdeletes');
        Route::get('/trash', [ProductController::class, 'trash'])->name('product.trash');
        Route::put('/restoredelete/{id}', [ProductController::class, 'restoredelete'])->name('product.restoredelete');
        Route::get('destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    });
    // nhân viên
    Route::prefix('user')->group(function () {
        Route::get('/index', [UsersController::class, 'index'])->name('user.index');
        Route::get('/create', [UsersController::class, 'create'])->name('user.create');
        Route::post('/store', [UsersController::class, 'store'])->name('user.store');
        Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('user.edit');
        Route::put('/update/{id}', [UsersController::class, 'update'])->name('user.update');
        Route::delete('destroy/{id}', [UsersController::class, 'destroy'])->name('user.destroy');
    });
    // nhoms nhaan vien
    Route::prefix('group')->group(function () {
        Route::get('/index', [GroupController::class, 'index'])->name('group.index');
        Route::get('/create', [GroupController::class, 'create'])->name('group.create');
        Route::post('/store', [GroupController::class, 'store'])->name('group.store');
        Route::get('/edit/{id}', [GroupController::class, 'edit'])->name('group.edit');
        Route::put('/update/{id}', [GroupController::class, 'update'])->name('group.update');
        Route::delete('destroy/{id}', [GroupController::class, 'destroy'])->name('group.destroy');

        // trao quyền
        Route::get('/detail/{id}', [GroupController::class, 'detail'])->name('group.detail');
        Route::put('/group_detail/{id}', [GroupController::class, 'group_detail'])->name('group.group_detail');
    });
});

Route::prefix('order')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('order.index');
    Route::get('/detail/{id}', [OrderController::class, 'detail'])->name('order.detail');
});
Route::get('/xuat', [OrderController::class, 'exportOrder'])->name('xuat');

Route::prefix('shop1')->group(function () {
Route::get('/', [ShopController::class, 'index'])->name('shop.index');
Route::get('/showProduct/{id}', [ShopController::class, 'show'])->name('shop.showProduct');
Route::get('/store/{id}', [ShopController::class, 'store'])->name('shop.store');
Route::get('/cart', [ShopController::class, 'Cart'])->name('cart.index');
Route::get('/remove-from-cart/{id}', [ShopController::class, 'remove'])->name('remove.from.cart');
Route::get('/checkOuts', [ShopController::class, 'checkOuts'])->name('checkOuts');
Route::get('/login', [ShopController::class, 'indexlogin'])->name('login.index');
Route::post('/checkregister', [ShopController::class, 'checkregister'])->name('shop.checkregister');
Route::get('/register', [ShopController::class, 'register'])->name('shop.register');
Route::post('/checklogin', [ShopController::class, 'checklogin'])->name('shop.checklogin');
Route::post('/order', [ShopController::class, 'order'])->name('order');
Route::delete('/remove-from-cart/{id}', [ShopController::class, 'remove'])->name('remove.from.cart');

});

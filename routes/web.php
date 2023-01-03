<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
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
Route::prefix('categories')->group(function () {
    Route::get('/index', [CategoryController::class,'index'])->name('categories.index');
    Route::get('/create', [CategoryController::class,'create'])->name('categories.create');
    Route::post('/store', [CategoryController::class,'store'])->name('categories.store');
    Route::get('/edit/{id}', [CategoryController::class,'edit'])->name('categories.edit');
    Route::put('/update/{id}', [CategoryController::class,'update'])->name('categories.update');
    Route::delete('/delete/{id}', [CategoryController::class,'delete'])->name('categories.delete');
});

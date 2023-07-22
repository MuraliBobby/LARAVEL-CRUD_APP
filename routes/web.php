<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductContrller;   
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

Route::get('/product',[ProductContrller::class,'index'])->name('product.index');
Route::get('/product/create',[ProductContrller::class,'create'])->name('product.create');
Route::post('/product',[ProductContrller::class,'submit'])->name('product.submit');
Route::get('/product/{product}/edit',[ProductContrller::class,'edit'])->name('product.edit');
Route::put('/product/{product}/update',[ProductContrller::class,'update'])->name('product.update');
Route::delete('/product/{product}/delete',[ProductContrller::class,'delete'])->name('product.delete');
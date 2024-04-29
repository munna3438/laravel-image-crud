<?php

use App\Http\Controllers\image_crud;
use Illuminate\Support\Facades\Route;


Route::get('/',[image_crud::class,'index'])->name('product.list');
Route::get('/create',[image_crud::class,'new_Product'])->name('product.create');
Route::post('/store',[image_crud::class,'product_store'])->name('product.store');
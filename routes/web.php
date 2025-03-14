<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home')->name('home');
Route::prefix('products')->name('products.')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/', [ProductController::class, 'store'])->name('store');
    Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('edit');
    Route::get('/{product}', [ProductController::class, 'show'])->name('show');
    Route::delete('/{product}', [ProductController::class, 'destroy'])->name('destroy');
    Route::put('/{product}', [ProductController::class, 'update'])->name('update');
});

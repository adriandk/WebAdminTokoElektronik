<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, 'loginPage'])->name('login');
Route::post('/', [AdminController::class, 'login'])->name('login');

Route::get('/sign-up', [AdminController::class, 'signUpPage'])->name('sign-up');
Route::post('/sign-up', [AdminController::class, 'signUp'])->name('sign-up');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

    Route::get('/product', [AdminController::class, 'productIndex'])->name('product.index');
    Route::get('/product/create', [AdminController::class, 'productCreate'])->name('product.create');
    Route::post('/product/store', [AdminController::class, 'productStore'])->name('product.store');
    Route::delete('/product/{id}/delete', [AdminController::class, 'productDelete'])->name('product.delete');
    Route::get('/product/{id}/edit', [AdminController::class, 'productEdit'])->name('product.edit');
    Route::put('/product/{id}/update', [AdminController::class, 'productUpdate'])->name('product.update');
    
    Route::get('/download-report', [AdminController::class, 'downloadReport'])->name('download.report');
});

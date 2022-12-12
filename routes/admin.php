<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\Members\{UserController, AdminController};

Route::middleware('back_url')->as('admin.')->group(function () {

    Route::view('dashboard', 'admin.pages.index')->name('dashboard');

    // members
    Route::group([], function () {
        // users
        Route::group([], function () {
            Route::get('users', [UserController::class, 'index'])->name('users.index');
            Route::get('users/create', [UserController::class, 'create'])->name('users.create');
            Route::post('users/create', [UserController::class, 'store']);
            Route::get('users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
            Route::put('users/{user}/edit', [UserController::class, 'update']);
            Route::delete('users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
        });
        // admins
        Route::group([], function () {
            Route::get('admins', [AdminController::class, 'index'])->name('admins.index');
        });
    });

    // products
    Route::group([], function () {
        Route::get('products', [ProductController::class, 'index'])->name('products.index');
        Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('products/create', [ProductController::class, 'store']);
        Route::get('products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('products/{product}/edit', [ProductController::class, 'update']);
        Route::delete('products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    });
});

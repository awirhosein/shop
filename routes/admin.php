<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{ProductController, CategoryController};
use App\Http\Controllers\Admin\Members\{UserController, AdminController};


Route::as('admin.')->group(function () {

    Route::view('dashboard', 'admin.pages.index')->name('dashboard');

    // members
    Route::group([], function () {
        // users
        Route::group([], function () {
            Route::resource('users', UserController::class)->only(['create', 'edit'])->middleware('back_url');
            Route::resource('users', UserController::class)->except(['create', 'edit', 'show']);
        });
        // admins
        Route::group([], function () {
            Route::get('admins', [AdminController::class, 'index'])->name('admins.index');
        });
    });

    // products
    Route::group([], function () {
        Route::resource('products', ProductController::class)->only(['create', 'edit'])->middleware('back_url');
        Route::resource('products', ProductController::class)->except(['create', 'edit', 'show']);
    });

    // categories
    Route::resource('categories', CategoryController::class)->only(['create', 'edit'])->middleware('back_url');
    Route::resource('categories', CategoryController::class)->except(['create', 'edit', 'show']);
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\{AttributeController, ProductController, CategoryController};
use App\Http\Controllers\Admin\Members\{UserController, AdminController};


Route::as('admin.')->group(function () {

    Route::view('dashboard', 'admin.pages.index')->name('dashboard');

    // members
    Route::group([], function () {
        // users
        Route::resource('users', UserController::class)->only(['create', 'edit'])->middleware('back_url');
        Route::resource('users', UserController::class)->except(['create', 'edit', 'show']);

        // admins
        Route::get('admins', [AdminController::class, 'index'])->name('admins.index');
    });

    // products
    Route::resource('products', ProductController::class)->only(['create', 'edit'])->middleware('back_url');
    Route::resource('products', ProductController::class)->except(['create', 'edit', 'show']);

    // products : attributes
    Route::get('products/{product}/attributes', [ProductController::class, 'attribute'])->name('products.attributes.edit')->middleware('back_url');
    Route::put('products/{product}/attributes', [ProductController::class, 'attributeUpdate'])->name('products.attributes.update');

    // categories
    Route::resource('categories', CategoryController::class)->only(['create', 'edit'])->middleware('back_url');
    Route::resource('categories', CategoryController::class)->except(['create', 'edit', 'show']);

    // attributes
    Route::resource('attributes', AttributeController::class)->only(['create', 'edit'])->middleware('back_url');
    Route::resource('attributes', AttributeController::class)->except(['create', 'edit', 'show']);
});

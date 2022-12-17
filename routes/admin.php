<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Members\{UserController, AdminController};
use App\Http\Controllers\Admin\{AttributeController, CategoryController, ColorController};
use App\Http\Controllers\Admin\Products\{ProductController, ProductAttributeController, ProductColorController};

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
    Route::group([], function () {
        Route::resource('products', ProductController::class)->only(['create', 'edit'])->middleware('back_url');
        Route::resource('products', ProductController::class)->except(['create', 'edit', 'show']);

        // attributes
        Route::get('products/{product}/attributes', [ProductAttributeController::class, 'attribute'])->name('products.attributes.edit')->middleware('back_url');
        Route::put('products/{product}/attributes', [ProductAttributeController::class, 'attributeUpdate'])->name('products.attributes.update');

        // color and price
        Route::resource('products.colors', ProductColorController::class)->only(['create', 'edit'])->middleware('back_url');
        Route::resource('products.colors', ProductColorController::class)->except(['create', 'edit', 'show']);
    });

    // categories
    Route::resource('categories', CategoryController::class)->only(['create', 'edit'])->middleware('back_url');
    Route::resource('categories', CategoryController::class)->except(['create', 'edit', 'show']);

    // attributes
    Route::resource('attributes', AttributeController::class)->only(['create', 'edit'])->middleware('back_url');
    Route::resource('attributes', AttributeController::class)->except(['create', 'edit', 'show']);

    // colors
    Route::resource('colors', ColorController::class)->only(['create', 'edit'])->middleware('back_url');
    Route::resource('colors', ColorController::class)->except(['create', 'edit', 'show']);
});

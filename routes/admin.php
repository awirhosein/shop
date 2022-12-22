<?php

use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers\Admin')->as('admin.')->group(function () {

    Route::view('dashboard', 'admin.pages.index')->name('dashboard');

    // members
    Route::group([], function () {
        // users
        Route::resource('users', Members\UserController::class)->only(['create', 'edit'])->middleware('back_url');
        Route::resource('users', Members\UserController::class)->except(['create', 'edit', 'show']);

        // admins
        Route::get('admins', [Members\AdminController::class, 'index'])->name('admins.index');
    });

    // products
    Route::group([], function () {
        Route::resource('products', Products\ProductController::class)->only(['create', 'edit'])->middleware('back_url');
        Route::resource('products', Products\ProductController::class)->except(['create', 'edit', 'show']);

        // attributes
        Route::get('products/{product}/attributes', [Products\ProductAttributeController::class, 'attribute'])->name('products.attributes.edit')->middleware('back_url');
        Route::put('products/{product}/attributes', [Products\ProductAttributeController::class, 'attributeUpdate'])->name('products.attributes.update');

        // color and price
        Route::resource('products.colors', Products\ProductColorController::class)->only(['create', 'edit'])->middleware('back_url');
        Route::resource('products.colors', Products\ProductColorController::class)->except(['create', 'edit', 'show']);
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

    // comments
    Route::resource('comments', CommentController::class)->only('edit')->middleware('back_url');
    Route::resource('comments', CommentController::class)->except(['create', 'edit', 'show']);
});

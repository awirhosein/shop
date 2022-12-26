<?php

use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers\Admin')->as('admin.')->group(function () {

    Route::view('dashboard', 'admin.pages.index')->name('dashboard');

    // members
    Route::namespace('Members')->group(function () {
        // users
        Route::resource('users', UserController::class)->only(['create', 'edit'])->middleware('back_url');
        Route::resource('users', UserController::class)->except(['create', 'edit', 'show']);

        // admins
        Route::get('admins', [AdminController::class, 'index'])->name('admins.index');
    });

    // products
    Route::namespace('Products')->group(function () {
        // 
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

    // comments
    Route::resource('comments', CommentController::class)->only('edit')->middleware('back_url');
    Route::resource('comments', CommentController::class)->except(['create', 'edit', 'show']);

    // questions
    Route::resource('questions', QuestionController::class)->only('edit')->middleware('back_url');
    Route::resource('questions', QuestionController::class)->except(['create', 'edit', 'show']);
});

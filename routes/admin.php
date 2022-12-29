<?php

use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;

Route::namespace(Admin::class)->as('admin.')->group(function () {
    // 
    Route::view('dashboard', 'admin.pages.index')->name('dashboard');

    // members
    Route::resource('users', Members\UserController::class)->except('show');
    Route::resource('admins', Members\AdminController::class)->except('create', 'store', 'show');

    // products
    Route::resource('products', Products\ProductController::class)->except('show');
    Route::resource('products.attributes', Products\ProductAttributeController::class)->only('index', 'store');
    Route::resource('products.colors', Products\ProductColorController::class)->except('show');

    // categories
    Route::resource('categories', CategoryController::class)->except('show');
    // attributes
    Route::resource('attributes', AttributeController::class)->except('show');
    // colors
    Route::resource('colors', ColorController::class)->except('show');
    // comments
    Route::resource('comments', CommentController::class)->except('create', 'store', 'show');

    // questions
    Route::resource('questions', Questions\QuestionController::class)->except('create', 'store', 'show');
    Route::resource('questions.answers', Questions\AnswerController::class)->except('show');
});

<?php

use App\Http\Controllers\Api;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([], function () {
    Route::post('auth/register', [AuthController::class, 'register']);
    Route::post('auth/login', [AuthController::class, 'login']);
    Route::get('auth/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});

Route::group([], function () {
    // Category
    Route::get('categories', [Api\CategoryController::class, 'index']);

    // Product
    Route::get('category/{category:slug}', [Api\ProductController::class, 'index']);
    Route::get('product/{product:slug}', [Api\ProductController::class, 'show']);

    // Comment
    Route::get('product/{product:slug}/comments', [Api\CommentController::class, 'index']);
    Route::post('product/{product:slug}/comments', [Api\CommentController::class, 'store'])->middleware('auth:sanctum');
});

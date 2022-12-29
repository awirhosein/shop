<?php

use App\Http\Controllers\Api;
use Illuminate\Support\Facades\Route;

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

/**
 * Authentication
 */
Route::post('auth/register', [Api\AuthController::class, 'register']);
Route::post('auth/login', [Api\AuthController::class, 'login']);
Route::get('auth/logout', [Api\AuthController::class, 'logout'])->middleware('auth:sanctum');

/**
 * Category
 */
Route::get('categories', [Api\CategoryController::class, 'index']);

/**
 * Product
 */
Route::get('category/{category}', [Api\ProductController::class, 'index']);
Route::get('product/{product}', [Api\ProductController::class, 'show']);

/**
 * Comment
 */
Route::get('product/{product}/comments', [Api\CommentController::class, 'index']);
Route::post('product/{product}/comments', [Api\CommentController::class, 'store'])->middleware('auth:sanctum');

/**
 * Question & Answer
 */
Route::get('product/{product}/questions', [Api\QuestionController::class, 'index']);
Route::post('product/{product}/questions', [Api\QuestionController::class, 'store'])->middleware('auth:sanctum');

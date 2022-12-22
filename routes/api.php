<?php

use Illuminate\Http\Request;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('categories', [Api\CategoryController::class, 'index']);

Route::get('category/{category:slug}', [Api\ProductController::class, 'index']);
Route::get('product/{product:slug}', [Api\ProductController::class, 'show']);
Route::get('product/{product:slug}/comments', [Api\ProductController::class, 'comments']);

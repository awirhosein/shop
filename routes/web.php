<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Members\{UserController, AdminController};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


Route::prefix('dashboard')->as('admin.')->middleware(['auth', 'admin', 'back_url'])->group(function () {

    Route::get('/', function () {
        return view('admin.pages.index');
    })->name('dashboard');

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

});
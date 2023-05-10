<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::middleware('auth:admin')->group(function () {
    Route::prefix('register')->name('register.')->group(function () {
        Route::get('/item', [App\Http\Controllers\ItemController::class, 'showRegister'])->name('item');
        Route::post('/item', [App\Http\Controllers\ItemController::class, 'store']);
    });
    Route::prefix('items')->name('item.')->group(function () {
        Route::get('/{UUID}/update', [App\Http\Controllers\ItemController::class, 'showUpdate'])->name('update');
        Route::post('/{UUID}/update', [App\Http\Controllers\ItemController::class, 'update']);
        Route::get('/{UUID}/delete', [App\Http\Controllers\ItemController::class, 'showDelete'])->name('delete');
        Route::post('/{UUID}/delete', [App\Http\Controllers\ItemController::class, 'delete']);
    });
});
Route::middleware('auth:superadmin')->group(function () {
    Route::prefix('admins')->name('admin.')->group(function () {
        Route::get('/', [App\Http\Controllers\AdminController::class, 'index'])->name('list');
        Route::get('{UUID}/update', [App\Http\Controllers\AdminController::class, 'showUpdate'])->name('update');
        Route::post('{UUID}/update', [App\Http\Controllers\AdminController::class, 'update']);
        Route::get('{UUID}/delete', [App\Http\Controllers\AdminController::class, 'showDelete'])->name('delete');
        Route::post('{UUID}/delete', [App\Http\Controllers\AdminController::class, 'delete']);
    });
});

Route::middleware('auth:admin,merchant')->group(function () {
    Route::prefix('items')->name('item.')->group(function () {
        Route::get('/', [App\Http\Controllers\ItemController::class, 'index'])->name('list');
        Route::get('/{UUID}', [App\Http\Controllers\ItemController::class, 'show'])->name('detail');
       });
});
Route::middleware('auth:admin,superadmin,merchant')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
});

require __DIR__.'/auth.php';

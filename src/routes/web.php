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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth:admin,superadmin,merchant')->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::prefix('items')->name('item.')->group(function () {
    Route::get('/', [App\Http\Controllers\ItemController::class, 'list'])->name('list');
    Route::get('register', [App\Http\Controllers\ItemController::class, 'showRegister'])->name('register');
    Route::post('register', [App\Http\Controllers\ItemController::class, 'register']);
    Route::get('{UUID}/update', [App\Http\Controllers\ItemController::class, 'showUpdate'])->name('update');
    Route::post('{UUID}/update', [App\Http\Controllers\ItemController::class, 'update']);
    Route::get('{UUID}/delete', [App\Http\Controllers\ItemController::class, 'showDelete'])->name('delete');
    Route::post('{UUID}/delete', [App\Http\Controllers\ItemController::class, 'delete']);
});
Route::prefix('admins')->name('admin.')->group(function () {
    Route::get('/', [App\Http\Controllers\AdminController::class, 'list'])->name('list');
    Route::get('{UUID}/update', [App\Http\Controllers\AdminController::class, 'showUpdate'])->name('update');
    Route::post('{UUID}/update', [App\Http\Controllers\AdminController::class, 'update']);
    Route::get('{UUID}/delete', [App\Http\Controllers\AdminController::class, 'showDelete'])->name('delete');
    Route::post('{UUID}/delete', [App\Http\Controllers\AdminController::class, 'delete']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
require __DIR__.'/auth.php';

<?php
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showAdminLoginForm'])->name('login');
    Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showAdminRegisterForm'])->name('register');
    Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin']);
    Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'registerAdmin']);
    Route::get('password/reset', [App\Http\Controllers\Auth\AdminForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [App\Http\Controllers\Auth\AdminForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [App\Http\Controllers\Auth\AdminResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [App\Http\Controllers\Auth\AdminResetPasswordController::class, 'reset'])->name('password.update');
});
Route::prefix('superadmin')->name('superadmin.')->group(function () {
    Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showSuperAdminLoginForm'])->name('login');
    // Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showSuperAdminRegisterForm'])->name('register');
    Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'superAdminLogin']);
    // Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'registerSuperAdmin']);
    Route::get('password/reset', [App\Http\Controllers\Auth\SuperAdminForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [App\Http\Controllers\Auth\SuperAdminForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [App\Http\Controllers\Auth\SuperAdminResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [App\Http\Controllers\Auth\SuperAdminResetPasswordController::class, 'reset'])->name('password.update');
});
Route::prefix('merchant')->name('merchant.')->group(function () {
    Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showMerchantLoginForm'])->name('login');
    Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showMerchantRegisterForm'])->name('register');
    Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'merchantLogin']);
    Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'registerMerchant']);
    Route::get('password/reset', [App\Http\Controllers\Auth\MerchantForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [App\Http\Controllers\Auth\MerchantForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [App\Http\Controllers\Auth\MerchantResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [App\Http\Controllers\Auth\MerchantResetPasswordController::class, 'reset'])->name('password.update');
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\BookTypeController;
use App\Http\Controllers\Admin\PdfController;
use App\Http\Controllers\Admin\ApkController;
use App\Http\Controllers\Admin\ApkTypeController;
use App\Http\Controllers\Admin\PhoneNumberController;

Route::get('/', function () {
    return auth()->check() 
        ? redirect()->route('admin.dashboard')
        : redirect()->route('login');
});

Auth::routes(['verify' => false]);

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Book Types
    Route::resource('book-types', BookTypeController::class)->except(['show']);
    
    // Books
    Route::resource('books', BookController::class)->except(['show']);
    
    // APK Types
    Route::resource('apk-types', ApkTypeController::class)->except(['show']);
    
    // APKs
    Route::resource('apks', ApkController::class)->except(['show']);

    // Phone Number Routes
    Route::resource('phone-numbers', PhoneNumberController::class)->except(['show']);
});
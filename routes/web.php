<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\BookTypeController;
use App\Http\Controllers\Admin\PdfController;
use App\Http\Controllers\Admin\PdfTypeController;
use App\Http\Controllers\Admin\ApkController;
use App\Http\Controllers\Admin\ApkTypeController;
use App\Http\Controllers\Admin\PhoneController;

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
    
    // PDF Types
    Route::resource('pdf-types', PdfTypeController::class)->except(['show']);
    
    // PDFs
    Route::resource('pdfs', PdfController::class)->except(['show']);
    
    // APK Types
    Route::resource('apk-types', ApkTypeController::class)->except(['show']);
    
    // APKs
    Route::resource('apks', ApkController::class)->except(['show']);
    
    // Phones
    Route::resource('phones', PhoneController::class)->except(['show']);
});
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DataController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::get('/books', [DataController::class, 'books']);
    Route::get('/pdfs', [DataController::class, 'pdfs']);
    Route::get('/apks', [DataController::class, 'apks']);
    Route::get('/phones', [DataController::class, 'phones']);
    Route::get('/booktypes', [DataController::class, 'booktypes']);
});
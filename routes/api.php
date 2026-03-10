<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ProductController;

Route::get('/products', [ProductController::class, 'apiIndex']);
Route::get('/products/{id}', [ProductController::class, 'apiShow']);
Route::post('/products', [ProductController::class, 'apiStore']);
Route::put('/products/{id}', [ProductController::class, 'apiUpdate']);
Route::delete('/products/{id}', [ProductController::class, 'apiDestroy']);
?>
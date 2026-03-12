<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\CommentController;
use App\Http\Controllers\admin\RatingController;
use App\Http\Controllers\admin\CartsController;
use App\Http\Controllers\admin\AddressController;

Route::apiResource('products', ProductController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('orders', OrderController::class);
Route::apiResource('customers', CustomerController::class);
Route::apiResource('comments', CommentController::class);
Route::apiResource('ratings', RatingController::class);
Route::apiResource('carts', CartsController::class);
Route::apiResource('addresses', AddressController::class);


?>
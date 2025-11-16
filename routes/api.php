<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\PromotionController;

Route::get('products/new-arrivals', [ProductController::class, 'newArrivals']);

Route::resource('products', ProductController::class);
Route::get('products/edits', [CustomController::class, 'editAll']);



// ROUTE PROMOTIONS (Hanya index dan show)
Route::resource('promotions', PromotionController::class)->only(['index', 'show']);
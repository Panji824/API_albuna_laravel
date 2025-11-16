<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminProductController; // PERBAIKAN: Import Controller Admin
use App\Http\Controllers\Admin\AdminPromotionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Rute Default
Route::get('/', function () {
    return view('welcome');
});

// Rute Breeze Default
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// -------------------------------------------------------------------
// Rute Admin Panel (Memerlukan Perbaikan di Bagian Resource)
// -------------------------------------------------------------------
Route::middleware(['auth'])->prefix('admin')->group(function () {
    
    Route::get('/', function () {
        return view('admin.dashboard'); 
    })->name('admin.dashboard');

    // ROUTE RESOURCE PRODUCT
    // Mengarahkan route CRUD ke AdminProductController
    Route::resource('products', AdminProductController::class)->names('admin.products');

    // ROUTE RESOURCE PROMOTION
    // Mengarahkan route CRUD ke AdminProductController
    Route::resource('promotions', AdminPromotionController::class)->names('admin.promotions')->parameters([
        'promotions' => 'promotion' 
    ]);
});

require __DIR__.'/auth.php';
<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Dashboard route
Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Cafeteria Routes
Route::prefix('cafeteria')->group(function() {
    // Public routes
    Route::get('/menu', [\App\Http\Controllers\MenuController::class, 'index'])->name('menu');
    
    // Authenticated routes
    Route::middleware(['auth'])->group(function() {
        Route::get('/order', [\App\Http\Controllers\OrderController::class, 'create'])->name('order.create');
        Route::post('/order', [\App\Http\Controllers\OrderController::class, 'store'])->name('order.store');
        Route::get('/orders', [\App\Http\Controllers\OrderController::class, 'index'])->name('orders.index');
        
        // Admin routes
        Route::middleware(['can:admin'])->group(function() {
            Route::resource('/inventory', \App\Http\Controllers\InventoryController::class);
            Route::resource('/menu-items', \App\Http\Controllers\MenuItemController::class);
            Route::resource('/settings', \App\Http\Controllers\SystemSettingsController::class)->only(['index', 'edit', 'update']);
        });
    });
});

// Existing auth routes
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';

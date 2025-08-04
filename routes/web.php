<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Dashboard route
Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Cafeteria Routes
Route::prefix('cafeteria')->group(function() {
    // Public routes
    Route::get('/menu', [\App\Http\Controllers\MenuController::class, 'index'])->name('menu');
    Route::get('/menu/item/{id}', [\App\Http\Controllers\MenuController::class, 'show'])->name('menu.item');
    Route::get('/menu/category/{categoryId}', [\App\Http\Controllers\MenuController::class, 'category'])->name('menu.category');
    
    // Time-specific menus
    Route::get('/menu/morning', [\App\Http\Controllers\MenuController::class, 'morningMenu'])->name('menu.morning');
    Route::get('/menu/lunch', [\App\Http\Controllers\MenuController::class, 'lunchMenu'])->name('menu.lunch');
    Route::get('/menu/afternoon-evening', [\App\Http\Controllers\MenuController::class, 'afternoonEveningMenu'])->name('menu.afternoon-evening');
    Route::get('/menu/night', [\App\Http\Controllers\MenuController::class, 'nightMenu'])->name('menu.night');
    Route::get('/menu/general', [\App\Http\Controllers\MenuController::class, 'generalMenu'])->name('menu.general');
    
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

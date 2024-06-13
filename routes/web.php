<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RetroController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth', 'admin')->group(function() {
    Route::get('dashboard/admin', [HomeController::class, 'index']);
    Route::get('dashboard/retro', [RetroController::class, 'index'])->name('dashboard/retro');;
    Route::get('dashboard/retro/create', [RetroController::class, 'create'])->name('dashboard/retro/create');
    Route::post('dashboard/retro/save', [RetroController::class, 'save'])->name('dashboard/retro/save');
    Route::get('/dashboard/retro/edit/{id}', [RetroController::class, 'edit'])->name('dashboard/retro/edit');
    Route::put('/dashboard/retro/update/{id}', [RetroController::class, 'update'])->name('dashboard/retro/update');
    Route::get('/dashboard/retro/delete/{id}', [RetroController::class, 'delete'])->name('dashboard/retro/delete');
});
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
require __DIR__.'/auth.php';


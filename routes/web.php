<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

// Route to display the login form
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Route to handle the login process
Route::post('/login', [AuthController::class, 'login']);


// Define the home/dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('/barangs', [BarangController::class, 'index'])->name('barangs.index');
Route::get('/barangs/create', [BarangController::class, 'create'])->name('barangs.create');
Route::post('/barangs', [BarangController::class, 'store'])->name('barangs.store');
Route::get('/barangs/{id}/edit', [BarangController::class, 'edit'])->name('barangs.edit');
Route::put('/barangs/{id}', [BarangController::class, 'update'])->name('barangs.update');
Route::delete('/barangs/{id}', [BarangController::class, 'destroy'])->name('barangs.destroy');

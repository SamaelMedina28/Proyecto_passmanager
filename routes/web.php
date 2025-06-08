<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\PasswordController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Mostrar
Route::get('/dashboard', [PasswordController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
// Formulario crear
Route::get('/passwords/create', [PasswordController::class, 'create'])->name('passwords.create')->middleware(['auth', 'verified']);
// Formulario editar
Route::get('/passwords/{id}/edit', [PasswordController::class, 'edit'])->name('passwords.edit')->middleware(['auth', 'verified']);
// Actualizar
Route::put('/passwords/{id}', [PasswordController::class, 'update'])->name('passwords.update')->middleware(['auth', 'verified']);



Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';

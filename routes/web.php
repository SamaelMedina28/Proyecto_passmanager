<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\PasswordController;
use App\Exports\PasswordsExport;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', function () {
    return view('welcome');
})->name('home');
//! Passwords
// Mostrar
Route::get('/dashboard', [PasswordController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
// Formulario crear
Route::get('/passwords/create', [PasswordController::class, 'create'])->name('passwords.create')->middleware(['auth', 'verified']);
// Formulario editar
Route::get('/passwords/{id}/edit', [PasswordController::class, 'edit'])->name('passwords.edit')->middleware(['auth', 'verified']);
// Actualizar
Route::put('/passwords/{id}', [PasswordController::class, 'update'])->name('passwords.update')->middleware(['auth', 'verified']);

//! Exportar
Route::get('/passwords/export', function () {
    return Excel::download(new PasswordsExport, 'passwords.xlsx');
})->name('passwords.export')->middleware(['auth', 'verified']);

//! Settings
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';

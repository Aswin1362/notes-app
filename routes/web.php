<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'login')->name('user.login');

Route::get('login', [AuthController::class, 'create'])->name('user.login');
Route::post('login', [AuthController::class, 'store'])->name('user.login.store');
Route::get('register', [RegisterController::class, 'create'])->name('user.register');
Route::post('register', [RegisterController::class, 'store'])->name('user.register.store');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('note', [NoteController::class, 'index'])->name('note.index');
    Route::get('note/create', [NoteController::class, 'create'])->name('note.create');
    Route::post('note/store', [NoteController::class, 'store'])->name('note.store');
    Route::get('/note/{note}', [NoteController::class, 'show'])->name('note.show');
    Route::get('note/{note}/edit', [NoteController::class, 'edit'])->name('note.edit');
    Route::put('note/{note}', [NoteController::class, 'update'])->name('note.update');
    Route::delete('/note/{note}', [NoteController::class, 'destroy'])->name('note.destroy');
});

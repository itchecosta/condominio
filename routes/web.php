<?php

use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('providers.index');
});

// Rotas de autenticação (pode-se usar scaffolding do Laravel Breeze ou similar)
Auth::routes();

Route::middleware('auth')->group(function () {
    // CRUD de fornecedores e avaliação
    Route::resource('providers', ProviderController::class);
    Route::post('providers/{provider}/reviews', [ReviewController::class, 'store'])->name('reviews.store');

    // Rotas somente para administradores (CRUD de usuários)
    Route::middleware('admin')->group(function () {
        Route::resource('users', UserController::class);
    });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

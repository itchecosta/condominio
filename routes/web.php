<?php

use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AppointmentGroupController;
use App\Http\Controllers\AppointmentMemberController;
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

    Route::resource('appointment-groups', AppointmentGroupController::class);
    // Rota para adicionar membro em grupo específico
    Route::post('appointment-groups/{appointmentGroup}/members', 
                [AppointmentMemberController::class,'store'])
         ->name('appointment-groups.members.store');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

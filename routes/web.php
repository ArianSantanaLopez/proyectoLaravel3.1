<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome'); // aquí va tu vista personalizada
})->name('home');

// PARTIDOS
Route::get('/partidos', [PartidoController::class, 'index'])->name('partidos.index');
Route::get('/partidos/create', [PartidoController::class, 'create'])->name('partidos.create');
Route::post('/partidos', [PartidoController::class, 'store'])->name('partidos.store');

// JETSTREAM
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// ADMINLTE
Route::middleware(['auth'])->group(function () {

    Route::get('/adminlte', function () {
        return view('adminlte_welcome');
    })->name('adminlte.welcome');

    Route::get('/adminlte/form', function () {
        return view('adminlte_form');
    })->name('adminlte.form');

});

// CRUD USERS - AHORA CON Route::resource
Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        /*
        // RUTAS MANUALES (AHORA ESTÁN COMENTADAS)
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::put('/users/{id}/edit', [UserController::class, 'update'])->name('users.update');
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
        */

        
        Route::resource('users', UserController::class);
    });
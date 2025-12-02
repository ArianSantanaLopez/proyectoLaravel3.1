<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartidoController;
use App\Http\Controllers\Admin\UserController;

Route::get('/', function () {
    return view('welcome'); // aquí va tu vista personalizada
})->name('home');

Route::get('/partidos', [PartidoController::class, 'index'])->name('partidos.index');
Route::get('/partidos/create', [PartidoController::class, 'create'])->name('partidos.create');
Route::post('/partidos', [PartidoController::class, 'store'])->name('partidos.store');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
use Illuminate\Support\Facades\Mail;

Route::get('/test-mail', function () {
    Mail::raw('Correo de prueba desde Laravel y Mailtrap', function ($message) {
        $message->to('demo@example.com')
                ->subject('Prueba Mailtrap');
    });

    return 'Correo enviado. Revisa tu bandeja en Mailtrap ✅';
});
Route::middleware(['auth'])->group(function () {

    Route::get('/adminlte', function () {
        return view('adminlte_welcome');
    })->name('adminlte.welcome');

    Route::get('/adminlte/form', function () {
        return view('adminlte_form');
    })->name('adminlte.form');

    });

    Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // LISTAR
        Route::get('/users', [UserController::class, 'index'])->name('users.index');

        // MOSTRAR DETALLE
        Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

        // FORMULARIO CREACIÓN
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');

        // GUARDAR NUEVO
        Route::post('/users', [UserController::class, 'store'])->name('users.store');

        // FORMULARIO EDICIÓN
        Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');

        // ACTUALIZAR
        Route::put('/users/{id}/edit', [UserController::class, 'update'])->name('users.update');

        // ELIMINAR
        Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    });
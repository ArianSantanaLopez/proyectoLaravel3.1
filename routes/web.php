<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartidoController;

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

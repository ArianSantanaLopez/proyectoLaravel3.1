<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartidoController;

Route::get('/', function () {
    return view('welcome'); // aquí va tu vista personalizada
})->name('home');

Route::get('/partidos', [PartidoController::class, 'index'])->name('partidos.index');
Route::get('/partidos/create', [PartidoController::class, 'create'])->name('partidos.create');
Route::post('/partidos', [PartidoController::class, 'store'])->name('partidos.store');
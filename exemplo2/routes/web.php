<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChamadoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
   })->middleware('auth.custom');

Route::get('/dashboard', [ChamadoController::class, 'index'])->name('chamados.dashboard');
Route::get('/chamado/{chamado}', [ChamadoController::class, 'show'])->name('chamado.detalhe');

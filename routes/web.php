<?php

use App\Http\Controllers\PlanoController;
use App\Http\Controllers\AssinaturaController;
use Illuminate\Support\Facades\Route;

Route::get('/planos', [PlanoController::class, 'index'])
    ->name('planos.index');

Route::post('/assinar', [AssinaturaController::class, 'assinar'])
    ->middleware('auth')
    ->name('assinaturas.assinar');

Route::post('/cancelar-assinatura', [AssinaturaController::class, 'cancelar'])
    ->middleware('auth')
    ->name('assinaturas.cancelar');

<?php

use App\Http\Controllers\GiftCardController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PagamentoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GiftCardController::class, 'index'])
    ->name('giftcards.index');

Route::middleware('auth')->group(function () {
    
    Route::get('/pedidos', [PedidoController::class, 'index'])
        ->name('pedidos.index');

    Route::get('/pedidos/{pedido}', [PedidoController::class, 'show'])
        ->name('pedidos.show');

    Route::post('/pedidos/adicionar', [PedidoController::class, 'adicionar'])
        ->name('pedidos.adicionar');

    
    Route::get('/checkout/{pedido}', [PagamentoController::class, 'checkout'])
        ->name('pagamentos.checkout');

    Route::post('/checkout/{pedido}', [PagamentoController::class, 'processar'])
        ->name('pagamentos.processar');
});

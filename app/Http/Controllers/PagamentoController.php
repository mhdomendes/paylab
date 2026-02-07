<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Pagamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagamentoController extends Controller
{
    // 💳 Tela de checkout
    public function checkout(Pedido $pedido)
    {
        abort_if($pedido->user_id !== Auth::id(), 403);

        return view('pagamentos.checkout', compact('pedido'));
    }

    // 💰 Processar pagamento (simulação)
    public function processar(Request $request, Pedido $pedido)
    {
        abort_if($pedido->user_id !== Auth::id(), 403);

        if ($pedido->status !== 'aberto') {
            return redirect()->route('pedidos.show', $pedido->id);
        }

        // cria pagamento
        Pagamento::create([
            'pedido_id' => $pedido->id,
            'status' => 'aprovado', // simulação
            'metodo' => $request->metodo,
            'valor' => $pedido->total,
            'pago_em' => now(),
            'gateway_id' => uniqid('fake_'),
        ]);

        // atualiza pedido
        $pedido->update([
            'status' => 'pago'
        ]);

        return redirect()->route('pedidos.index')
            ->with('sucesso', 'Pagamento realizado com sucesso!');
    }
}

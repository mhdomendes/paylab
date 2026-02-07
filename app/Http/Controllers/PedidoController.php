<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\GiftCard;
use App\Models\ItemPedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    // 📜 Histórico de pedidos
    public function index()
    {
        $pedidos = Pedido::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('pedidos.index', compact('pedidos'));
    }

    // 🛒 Mostrar carrinho/pedido
    public function show(Pedido $pedido)
    {
        // segurança: só dono vê
        abort_if($pedido->user_id !== Auth::id(), 403);

        $pedido->load('itens.giftCard');

        return view('pedidos.show', compact('pedido'));
    }

    // ➕ Adicionar item ao carrinho
    public function adicionar(Request $request)
    {
        $gift = GiftCard::findOrFail($request->gift_card_id);

        // pega ou cria carrinho aberto
        $pedido = Pedido::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'status' => 'aberto'
            ],
            [
                'total' => 0,
                'criado_em' => now()
            ]
        );

        // verifica se item já existe
        $item = ItemPedido::where('pedido_id', $pedido->id)
            ->where('gift_card_id', $gift->id)
            ->first();

        if ($item) {
            $item->increment('quantidade');
        } else {
            ItemPedido::create([
                'pedido_id' => $pedido->id,
                'gift_card_id' => $gift->id,
                'quantidade' => 1,
                'valor_unitario' => $gift->valor,
            ]);
        }

        // recalcular total
        $total = $pedido->itens()
            ->selectRaw('SUM(quantidade * valor_unitario) as total')
            ->value('total');

        $pedido->update(['total' => $total]);

        return redirect()->route('pedidos.show', $pedido->id);
    }
}

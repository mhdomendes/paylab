@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Seu carrinho</h2>

@if($pedido->itens->isEmpty())
    <p>Nenhum item no carrinho.</p>
@else

<table class="w-full bg-white shadow rounded">
    <thead>
        <tr class="border-b">
            <th class="p-2 text-left">Gift Card</th>
            <th class="p-2">Qtd</th>
            <th class="p-2">Valor</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pedido->itens as $item)
        <tr class="border-b">
            <td class="p-2">{{ $item->giftCard->nome }}</td>
            <td class="p-2 text-center">{{ $item->quantidade }}</td>
            <td class="p-2 text-center">
                R$ {{ number_format($item->valor_unitario, 2, ',', '.') }}
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="mt-4">
    <p class="text-xl font-bold">
        Total: R$ {{ number_format($pedido->total, 2, ',', '.') }}
    </p>

    <a href="{{ route('pagamentos.checkout', $pedido->id) }}"
       class="bg-green-600 text-white px-4 py-2 rounded inline-block mt-2">
        Ir para pagamento
    </a>
</div>

@endif
@endsection

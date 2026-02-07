@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Pagamento</h2>

<p class="mb-4">
    Total do pedido:
    <strong>R$ {{ number_format($pedido->total, 2, ',', '.') }}</strong>
</p>

<form action="{{ route('pagamentos.processar', $pedido->id) }}" method="POST">
    @csrf

    <label class="block mb-2">Método de pagamento:</label>

    <select name="metodo" class="border p-2 rounded mb-4">
        <option value="pix">PIX</option>
        <option value="cartao">Cartão</option>
    </select>

    <button class="bg-green-600 text-white px-4 py-2 rounded">
        Pagar agora
    </button>
</form>
@endsection

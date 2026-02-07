@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Escolha seu Gift Card</h2>

<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    @foreach($giftcards as $gift)
        <div class="bg-white p-4 rounded shadow">
            <h3 class="font-bold text-lg">{{ $gift->nome }}</h3>

            <p class="text-gray-600 mb-2">
                R$ {{ number_format($gift->valor, 2, ',', '.') }}
            </p>

            <form action="{{ route('pedidos.adicionar') }}" method="POST">
                @csrf
                <input type="hidden" name="gift_card_id" value="{{ $gift->id }}">

                <button class="bg-blue-600 text-white px-4 py-2 rounded">
                    Adicionar ao carrinho
                </button>
            </form>
        </div>
    @endforeach
</div>
@endsection

@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-bold mb-4">Meus pedidos</h2>

<table class="w-full bg-white shadow rounded">
    <thead>
        <tr class="border-b">
            <th class="p-2">ID</th>
            <th class="p-2">Status</th>
            <th class="p-2">Total</th>
            <th class="p-2"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($pedidos as $pedido)
        <tr class="border-b">
            <td class="p-2">{{ $pedido->id }}</td>
            <td class="p-2">{{ $pedido->status }}</td>
            <td class="p-2">
                R$ {{ number_format($pedido->total, 2, ',', '.') }}
            </td>
            <td class="p-2">
                <a href="{{ route('pedidos.show', $pedido->id) }}"
                   class="text-blue-600">Ver</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

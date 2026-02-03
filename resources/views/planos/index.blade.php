<h1>Planos disponíveis</h1>

@foreach ($planos as $plano)
    <div>
        <h3>{{ $plano->nome }}</h3>
        <p>R$ {{ number_format($plano->preco, 2, ',', '.') }}</p>

        <form method="POST" action="{{ route('assinaturas.assinar') }}">
            @csrf
            <input type="hidden" name="plano_id" value="{{ $plano->id }}">
            <button>Assinar</button>
        </form>
    </div>
@endforeach

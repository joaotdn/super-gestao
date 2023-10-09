<div style="width: 30%; margin: 0 auto;">
    <span style="color: green;">{{ $msg ?? '' }}</span>
    @if (isset($cliente->id))
        <form action="{{ route('cliente.update', ['cliente' => $cliente->id]) }}" method="post">
            @csrf
            @method('PUT')
    @else
        <form action="{{ route('cliente.store') }}" method="post">
            @csrf
    @endif

    <input type="text" name="nome" placeholder="Nome" class="borda-preta" value="{{ $cliente->nome ?? old('nome') }}">
    <span style="color: red;">{{ $errors->has('nome') ? $errors->first('nome') : '' }}</span>

    <button type="submit" class="borda-preta">Cadastrar</button>
    </form>
</div>

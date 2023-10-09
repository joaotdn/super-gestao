<div style="width: 30%; margin: 0 auto;">
    <span style="color: green;">{{ $msg ?? '' }}</span>
    @if (isset($pedido->id))
        <form action="{{ route('pedido.update', ['pedido' => $pedido->id]) }}" method="post">
            @csrf
            @method('PUT')
        @else
            <form action="{{ route('pedido.store') }}" method="post">
                @csrf
    @endif
    <select name="cliente_id">
        <option>Selecione um cliente</option>
        @foreach ($clientes as $cliente)
            <option value="{{ $cliente->id }}"
                {{ ($pedido->cliente_id ?? old('cliente_id')) === $cliente->id ? 'selected' : '' }}>{{ $cliente->nome }}
            </option>
        @endforeach
    </select>
    <span style="color: red;">{{ $errors->has('cliente_id') ? $errors->first('cliente_id') : '' }}</span>

    <button type="submit" class="borda-preta">Cadastrar</button>
    </form>
</div>

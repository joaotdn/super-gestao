<div style="width: 30%; margin: 0 auto;">
    <form action="{{ route('pedido-produto.store', ['pedido' => $pedido]) }}" method="post">
        @csrf

        <select name="produto_id">
            <option>Selecione um produto</option>
            @foreach ($produtos as $produto)
                <option value="{{ $produto->id }}"
                    {{ ($pedido->produto_id ?? old('produto_id')) === $produto->id ? 'selected' : '' }}>{{ $produto->nome }}
                </option>
            @endforeach
        </select>
        <span style="color: red;">{{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}</span>

        <input type="number" name="quantidade" value="{{ old('quantidade') ?? '' }}" placeholder="Quantidade" class="borda-preta">
        <span style="color: red;">{{ $errors->has('quantidade') ? $errors->first('quantidade') : '' }}</span>

        <button type="submit" class="borda-preta">Cadastrar</button>
    </form>
</div>

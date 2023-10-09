<div style="width: 30%; margin: 0 auto;">
    <span style="color: green;">{{ $msg ?? '' }}</span>
    @if (isset($produto_detalhe->id))
        <form action="{{ route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id]) }}" method="post">
            @csrf
            @method('PUT')
        @else
            <form action="{{ route('produto-detalhe.store') }}" method="post">
                @csrf
    @endif
    <input type="text" name="produto_id" placeholder="ID do Produto" class="borda-preta" value="{{ $produto_detalhe->produto_id ?? old('produto_id') }}">
    <span style="color: red;">{{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}</span>
    
    <input type="text" name="comprimento" placeholder="Comprimento" class="borda-preta"
        value="{{ $produto_detalhe->comprimento ?? old('comprimento') }}">
    <span style="color: red;">{{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}</span>
    
    <input type="text" name="largura" placeholder="Largura" class="borda-preta"
        value="{{ $produto_detalhe->largura ?? old('largura') }}">
    <span style="color: red;">{{ $errors->has('largura') ? $errors->first('largura') : '' }}</span>

    <input type="text" name="altura" placeholder="Altura" class="borda-preta"
        value="{{ $produto_detalhe->altura ?? old('altura') }}">
    <span style="color: red;">{{ $errors->has('altura') ? $errors->first('altura') : '' }}</span>
    
    <select name="unidade_id">
        <option>Selecione a unidade de medida</option>
        @foreach ($unidades as $u)
            <option value="{{ $u->id }}"
                {{ ($produto_detalhe->unidade_id ?? old('unidade_id')) == $u->id ? 'selected' : '' }}>{{ $u->descricao }}
            </option>
        @endforeach
    </select>
    <span style="color: red;">{{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}</span>

    <button type="submit" class="borda-preta">Cadastrar</button>
    </form>
</div>

<div style="width: 30%; margin: 0 auto;">
    <span style="color: green;">{{ $msg ?? '' }}</span>
    @if (isset($produto->id))
        <form action="{{ route('produto.update', ['produto' => $produto->id]) }}" method="post">
            @csrf
            @method('PUT')
        @else
            <form action="{{ route('produto.store') }}" method="post">
                @csrf
    @endif
    <select name="fornecedor_id">
        <option>Selecione um fornecedor</option>
        @foreach ($fornecedores as $fornecedor)
            <option value="{{ $fornecedor->id }}" {{ ($produto->fornecedor_id ?? old('fornecedor_id') == $fornecedor->id) ? 'selected' : '' }}>{{ $fornecedor->nome }}</option>
        @endforeach
    </select>
    <span style="color: red;">{{ $errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : '' }}</span>

    <input type="text" name="nome" placeholder="Nome" class="borda-preta" value="{{ $produto->nome ?? old('nome') }}">
    <span style="color: red;">{{ $errors->has('nome') ? $errors->first('nome') : '' }}</span>
    
    <input type="text" name="descricao" placeholder="Descrição" class="borda-preta"
        value="{{ $produto->descricao ?? old('descricao') }}">
    <span style="color: red;">{{ $errors->has('descricao') ? $errors->first('descricao') : '' }}</span>
    
    <input type="text" name="peso" placeholder="Peso" class="borda-preta"
        value="{{ $produto->peso ?? old('peso') }}">
    <span style="color: red;">{{ $errors->has('peso') ? $errors->first('peso') : '' }}</span>
    
    <select name="unidade_id">
        <option>Selecione a unidade de medida</option>
        @foreach ($unidades as $u)
            <option value="{{ $u->id }}"
                {{ ($produto->unidade_id ?? old('unidade_id')) == $u->id ? 'selected' : '' }}>{{ $u->descricao }}
            </option>
        @endforeach
    </select>
    <span style="color: red;">{{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}</span>

    <button type="submit" class="borda-preta">Cadastrar</button>
    </form>
</div>

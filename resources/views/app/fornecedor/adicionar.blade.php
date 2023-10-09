@extends('app.layout.basico')
@section('titulo', 'Fornecedor')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <h1>Fornecedores - Adicionar</h1>
    </div>

    <div class="menu">
        <ul>
            <li>
                <a href="{{ route('app.fornecedor.adicionar') }}">Novo</a>
            </li>
            <li>
                <a href="{{ route('app.fornecedor') }}">Consulta</a>
            </li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 30%; margin: 0 auto;">
            <span style="color: green;">{{ $msg ?? '' }}</span>
            <form action="{{ route('app.fornecedor.adicionar') }}" method="post">
                <input type="hidden" name="id" value="{{ $fornecedor->id ?? '' }}">
                @csrf
                <input type="text" name="nome" placeholder="Nome" class="borda-preta" value="{{ $fornecedor->nome ?? old('nome') }}">
                <span style="color: red;">{{ $errors->has('nome') ? $errors->first('nome') : '' }}</span>
                <input type="text" name="site" placeholder="Site" class="borda-preta" value="{{ $fornecedor->site ?? old('site') }}">
                <span style="color: red;">{{ $errors->has('site') ? $errors->first('site') : '' }}</span>
                <input type="text" name="uf" placeholder="UF" class="borda-preta" value="{{ $fornecedor->uf ?? old('uf') }}">
                <span style="color: red;">{{ $errors->has('uf') ? $errors->first('uf') : '' }}</span>
                <input type="text" name="email" placeholder="E-mail" class="borda-preta" value="{{ $fornecedor->email ?? old('email') }}">
                <span style="color: red;">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                <button type="submit" class="borda-preta">Cadastrar</button>
            </form>
        </div>
    </div>
</div>
@endsection
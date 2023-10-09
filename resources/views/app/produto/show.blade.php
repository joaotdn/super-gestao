@extends('app.layout.basico')
@section('titulo', 'Produto')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <h1>Produto</h1>
    </div>

    <div class="menu">
        <ul>
            <li>
                <a href="{{ route('produto.index') }}">Voltar</a>
            </li>
            <li>
                <a href="#">Consulta</a>
            </li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 30%; margin: 0 auto;">
            <span style="color: green;">{{ $msg ?? '' }}</span>
            <table border="1" width="100%">
                <tr>
                    <td>ID:</td>
                    <td>{{ $produto->id }}</td>
                </tr>
                <tr>
                    <td>Nome:</td>
                    <td>{{ $produto->nome }}</td>
                </tr>
                <tr>
                    <td>Descrição:</td>
                    <td>{{ $produto->descricao }}</td>
                </tr>
                <tr>
                    <td>Peso:</td>
                    <td>{{ $produto->peso }} Kg</td>
                </tr>
                <tr>
                    <td>Unidade ID:</td>
                    <td>{{ $produto->unidade_id }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
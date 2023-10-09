@extends('app.layout.basico')
@section('titulo', 'Pedido')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <h1>Pedido</h1>
    </div>

    <div class="menu">
        <ul>
            <li>
                <a href="{{ route('pedido.index') }}">Voltar</a>
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
                    <td>{{ $pedido->id }}</td>
                </tr>
                <tr>
                    <td>Cliente</td>
                    <td>{{ $pedido->cliente->nome }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
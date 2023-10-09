@extends('app.layout.basico')
@section('titulo', 'Cliente')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <h1>Cliente</h1>
    </div>

    <div class="menu">
        <ul>
            <li>
                <a href="{{ route('cliente.index') }}">Voltar</a>
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
                    <td>{{ $cliente->id }}</td>
                </tr>
                <tr>
                    <td>Nome:</td>
                    <td>{{ $cliente->nome }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection
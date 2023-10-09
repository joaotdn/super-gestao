@extends('app.layout.basico')
@section('titulo', 'Clientes')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <h1>Clientes - Listar</h1>
    </div>

    <div class="menu">
        <ul>
            <li>
                <a href="{{ route('cliente.create') }}">Novo</a>
            </li>
            <li>
                <a href="#">Consulta</a>
            </li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 90%; margin: 0 auto;">
            @isset($clientes)
                @if (count($clientes) > 0)
                    <table border="1" width="100%">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($clientes as $c)
                               <tr>
                                    <td>{{ $c->nome }}</td>
                                    <td><a href="{{ route('cliente.show', ['cliente' => $c->id]) }}">Visualizar</a></td>
                                    <td>
                                        <form id="form_{{ $c->id }}" action="{{ route('cliente.destroy', ['cliente' => $c->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#" onclick="document.getElementById('form_{{ $c->id }}').submit()">Excluir</a>
                                        </form>
                                    </td>
                                    <td><a href="{{ route('cliente.edit', ['cliente' => $c->id]) }}">Editar</a></td>
                               </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $clientes->appends($request)->links() }}
                    <br>
                    Exibindo {{ $clientes->count() }} de {{ $clientes->total() }} resultados ({{ $clientes->firstItem() }}/{{ $clientes->lastItem() }})
                @else
                    <h3>Não encontramos resultados.</h3>
                @endif
            @endisset
        </div>
    </div>
</div>
@endsection
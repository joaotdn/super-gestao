@extends('app.layout.basico')
@section('titulo', 'Pedido')

@section('conteudo')
<div class="conteudo-pagina">
    <div class="titulo-pagina-2">
        <h1>Pedido - Listar</h1>
    </div>

    <div class="menu">
        <ul>
            <li>
                <a href="{{ route('pedido.create') }}">Novo</a>
            </li>
            <li>
                <a href="#">Consulta</a>
            </li>
        </ul>
    </div>

    <div class="informacao-pagina">
        <div style="width: 90%; margin: 0 auto;">
            @isset($pedidos)
                @if (count($pedidos) > 0)
                    <table border="1" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cliente</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($pedidos as $p)
                               <tr>
                                    <td>{{ $p->id }}</td>
                                    <td>{{ $p->cliente->nome }}</td>
                                    <td><a href="{{ route('pedido-produto.create', ['pedido' => $p->id]) }}">Adicionar Produtos</a></td>
                                    <td><a href="{{ route('pedido.show', ['pedido' => $p->id]) }}">Visualizar</a></td>
                                    <td>
                                        <form id="form_{{ $p->id }}" action="{{ route('pedido.destroy', ['pedido' => $p->id]) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="#" onclick="document.getElementById('form_{{ $p->id }}').submit()">Excluir</a>
                                        </form>
                                    </td>
                                    <td><a href="{{ route('pedido.edit', ['pedido' => $p->id]) }}">Editar</a></td>
                               </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $pedidos->appends($request)->links() }}
                    <br>
                    Exibindo {{ $pedidos->count() }} de {{ $pedidos->total() }} resultados ({{ $pedidos->firstItem() }}/{{ $pedidos->lastItem() }})
                @else
                    <h3>Não encontramos resultados.</h3>
                @endif
            @endisset
        </div>
    </div>
</div>
@endsection
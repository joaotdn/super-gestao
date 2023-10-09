@extends('app.layout.basico')
@section('titulo', 'Pedido/Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Pedido/Produto - Adicionar</h1>
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
            <h4>Detalhes do pedido</h4>
            <p>ID do pedido: {{ $pedido->id }}</p>
            <p>Cliente: {{ $pedido->cliente_id }}</p>
            <h4>Itens do pedido</h4>
            <table border="1" style="width: 30%; margin: 0 auto;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome do produto</th>
                        <th>Dada do pedido</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedido->produtos as $produto)
                        <tr>
                            <td>{{ $produto->id }}</td>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->pivot->created_at->format('d/m/Y') }}</td>
                            <td>
                                <form action="{{ route('pedido-produto.destroy', ['pedido' => $pedido->id, 'pedidoProduto' => $produto->pivot->id]) }}" id="form_{{ $produto->pivot->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" onclick="document.getElementById('form_{{ $produto->pivot->id }}').submit()">Excluir</a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @component('app.pedido_produto._components.form_create_edit', ['pedido' => $pedido, 'produtos' => $produtos])
            @endcomponent
        </div>
    </div>
@endsection

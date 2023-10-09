@extends('app.layout.basico')
@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Produtos - Listar</h1>
        </div>

        <div class="menu">
            <ul>
                <li>
                    <a href="{{ route('produto.create') }}">Novo</a>
                </li>
                <li>
                    <a href="#">Consulta</a>
                </li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin: 0 auto;">
                @isset($produtos)
                    @if (count($produtos) > 0)
                        <table border="1" width="100%">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Descrição</th>
                                    <th>Fornecedor</th>
                                    <th>Peso</th>
                                    <th>Unidade ID</th>
                                    <th>Comprimento</th>
                                    <th>Altura</th>
                                    <th>Largura</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($produtos as $p)
                                    <tr>
                                        <td>{{ $p->nome }}</td>
                                        <td>{{ $p->descricao }}</td>
                                        <td>{{ $p->fornecedor->nome }}</td>
                                        <td>{{ $p->peso }}</td>
                                        <td>{{ $p->unidade_id }}</td>
                                        <td>{{ $p->itemDetalhe->comprimento ?? '' }}</td>
                                        <td>{{ $p->itemDetalhe->altura ?? '' }}</td>
                                        <td>{{ $p->itemDetalhe->largura ?? '' }}</td>
                                        <td><a href="{{ route('produto.show', ['produto' => $p->id]) }}">Visualizar</a></td>
                                        <td>
                                            <form id="form_{{ $p->id }}"
                                                action="{{ route('produto.destroy', ['produto' => $p->id]) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="#"
                                                    onclick="document.getElementById('form_{{ $p->id }}').submit()">Excluir</a>
                                            </form>
                                        </td>
                                        <td><a href="{{ route('produto.edit', ['produto' => $p->id]) }}">Editar</a></td>
                                    </tr>
                                    <tr>
                                        <td colspan="12">
                                            <h4>
                                                Pedidos
                                            </h4>
                                            @foreach ($p->pedidos as $pedido)
                                                <p>
                                                    <a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">
                                                        Pedido: {{ $pedido->id }}
                                                    </a>
                                                </p>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $produtos->appends($request)->links() }}
                        <br>
                        Exibindo {{ $produtos->count() }} de {{ $produtos->total() }} resultados
                        ({{ $produtos->firstItem() }}/{{ $produtos->lastItem() }})
                    @else
                        <h3>Não encontramos resultados.</h3>
                    @endif
                @endisset
            </div>
        </div>
    </div>
@endsection

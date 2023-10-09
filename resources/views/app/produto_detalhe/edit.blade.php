@extends('app.layout.basico')
@section('titulo', 'Produto Detalhe')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Produto - Editar Detalhes</h1>
        </div>

        <div class="menu">
            <ul>
                <li>
                    <a href="#">Voltar</a>
                </li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <h4>Produto</h4>
            <p><strong>Nome:</strong> {{ $produto_detalhe->item->nome }}</p>
            <p><strong>Descrição:</strong> {{ $produto_detalhe->item->descricao }}</p>
            <p><strong>Fornecedor:</strong> {{ $produto_detalhe->item->fornecedor->nome }}</p>
            @component('app.produto_detalhe._components.form_create_edit', ['produto_detalhe' => $produto_detalhe, 'unidades' => $unidades])
            @endcomponent
        </div>
    </div>
@endsection

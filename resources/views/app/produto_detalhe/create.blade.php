@extends('app.layout.basico')
@section('titulo', 'Produto Detalhes')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Produto - Adicionar Detalhes</h1>
        </div>

        <div class="menu">
            <ul>
                <li>
                    <a href="#">Voltar</a>
                </li>
            </ul>
        </div>

        <div class="informacao-pagina">
            @component('app.produto_detalhe._components.form_create_edit', ['unidades' => $unidades])
            @endcomponent
        </div>
    </div>
@endsection

@extends('app.layout.basico')
@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Produto - Adicionar</h1>
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
            @component('app.produto._components.form_create_edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores])
            @endcomponent
        </div>
    </div>
@endsection

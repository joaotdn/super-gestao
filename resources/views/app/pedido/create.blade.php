@extends('app.layout.basico')
@section('titulo', 'Pedido')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Pedido - Adicionar</h1>
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
            @component('app.pedido._components.form_create_edit', ['clientes' => $clientes])
            @endcomponent
        </div>
    </div>
@endsection

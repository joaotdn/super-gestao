@extends('app.layout.basico')
@section('titulo', 'Cliente')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <h1>Cliente - Editar</h1>
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
            @component('app.cliente._components.form_create_edit', ['cliente' => $cliente])
            @endcomponent
        </div>
    </div>
@endsection

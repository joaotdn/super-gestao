<h1>Fornecedor</h1>

@php
    
@endphp

{{-- @dd($fornecedores) --}}

{{-- @if (count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns fornecedores</h3>
@elseif(count($fornecedores) > 10)
    <h3>Existem muitos fornecedores</h3>
@else 
    <h3>Ainda não exitem fornecedores</h3>
@endif --}}
{{-- 
@unless ($fornecedores[0]['status'] == 'S')
    Fornecedor Inativo
@endunless --}}

{{-- @isset($fornecedores)
    @isset($fornecedores[1])
        Exite 2 fornecedores
    @endisset
@endisset --}}

{{-- @empty($fornecedores)
    <p>Não existe fornecedores</p>
@endempty --}}

{{-- @isset($fornecedores)
    @forelse ($fornecedores as $fornecedor)
    Iteração atual {{ $loop->iteration }}
    CNPJ:  {{ $fornecedor['cnpj'] ?? 'Não preenchido'  }}
    <br>
    Cidade: {{ $fornecedor['ddd'] ?? 'Não preenchido' }}
    @switch($fornecedor['ddd'])
        @case('11')
            São Paulo
            @break
        @case('32')
            Juiz de Fora
            @break
        @case('85')
            Fortaleza
            @break
        @default
            Não exite
    @endswitch
    @if ($loop->last)
        Última iteração
    @endif
    <hr>
    @empty
        <p>Não exite fornecedor</p>
    @endforelse
@endisset --}}
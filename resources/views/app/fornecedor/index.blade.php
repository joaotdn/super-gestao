<h1>Fornecedor</h1>

@php
    
@endphp

{{-- @dd($fornecedores) --}}

@if (count($fornecedores) > 0 && count($fornecedores) < 10)
    <h3>Existem alguns fornecedores</h3>
@elseif(count($fornecedores) > 10)
    <h3>Existem muitos fornecedores</h3>
@else 
    <h3>Ainda não exitem fornecedores</h3>
@endif
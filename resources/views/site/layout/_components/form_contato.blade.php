{{ $slot }}
<form action="{{ route('site.contato') }}" method="post">
    @csrf
    <input name="nome" type="text" placeholder="Nome" class="{{ $classe }}" value="{{ old('nome') }}">
    @if ($errors->has('nome'))
        <span style="color: red;">{{ $errors->first('nome') }}</span>
    @endif
    <br>
    <input name="telefone" type="text" placeholder="Telefone" class="{{ $classe }}" value="{{ old('telefone') }}">
    @if ($errors->has('telefone'))
        <span style="color: red;">{{ $errors->first('telefone') }}</span>
    @endif
    <br>
    <input name="email" type="text" placeholder="E-mail" class="{{ $classe }}" value="{{ old('email') }}">
    @if ($errors->has('email'))
        <span style="color: red;">{{ $errors->first('email') }}</span>
    @endif
    <br>
    <select name="motivo_contatos_id" class="{{ $classe }}">
        <option value="">Qual o motivo do contato?</option>
        @foreach ($motivo_contatos as $motivo)
            <option value="{{ $motivo->id }}" {{ old('motivo_contatos_id') == $motivo->id ? 'selected' : '' }}>{{ $motivo->motivo_contato }}</option>
        @endforeach
    </select>
    @if ($errors->has('motivo_contatos_id'))
        <span style="color: red;">{{ $errors->first('motivo_contatos_id') }}</span>
    @endif
    <br>
    <textarea name="mensagem" class="{{ $classe }}">{{ (old('mensagem') != '') ? old('mensagem') : 'Preencha aqui a sua mensagem' }}</textarea>
    @if ($errors->has('mensagem'))
        <span style="color: red;">{{ $errors->first('mensagem') }}</span>
    @endif
    <br>
    <button type="submit" class="{{ $classe }}">ENVIAR</button>
</form>

{{-- @if ($errors->any())
<div class="" style="position: absolute; top: 0; left: 0; background-color: red; width: 100%;">
    @foreach ($errors->all() as $erro)
        {{ $erro }}<br>
    @endforeach
</div>
@endif --}}


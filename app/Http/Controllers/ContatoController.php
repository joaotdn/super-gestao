<?php

namespace App\Http\Controllers;

use App\MotivoContato;
use Illuminate\Http\Request;
use App\SiteContato;

class ContatoController extends Controller
{
    public function contato()
    {
        $motivos_contatos = MotivoContato::all();
        return view('site.contato', ['titulo' => 'Contato', 'motivo_contatos' => $motivos_contatos]);
    }

    public function salvar(Request $request)
    {
        $request->validate(
            [
                'nome' => 'required|min:3|max:40',
                'telefone' => 'required',
                'email' => 'email|unique:site_contatos',
                'motivo_contatos_id' => 'required',
                'mensagem' => 'required|min:10|max:200',
            ],
            [
                'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'email.email' => 'O campo email deve conter um email válido',
                'email.unique' => 'O campo email já foi utilizado',
                'mensagem.min' => 'O campo mensagem deve ter no mínimo 10 caracteres',
                'mensagem.max' => 'O campo mensagem deve ter no máximo 200 caracteres',
                'required' => 'O campo :attribute deve ser preenchido'
            ]
        );
        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}

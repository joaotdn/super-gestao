<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MotivoContato;

class PrincipalController extends Controller
{
    public function principal() {
        $motivos_contatos = MotivoContato::all();
        return view('site.principal', ['titulo' => 'Home', 'motivo_contatos' => $motivos_contatos]);
    }
}

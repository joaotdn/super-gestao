<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request) {
        $erro = '';

        if ($request->get('erro') == 1) {
            $erro = 'Usuário e/ou senha inválidos';
        }

        if ($request->get('erro') == 2) {
            $erro = 'Necessário realizar login para acesso a página';
        }

        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request) {
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];
        $feedback = [
            'required' => 'O campo :attribute é obrigatório',
            'email' => 'O campo :attribute deve ser um email válido'
        ];
        $request->validate($regras, $feedback);

        $email = $request->get('usuario');
        $password = $request->get('senha');
        
        $user = new User;

        $exists = $user->where('email', $email)->where('password', $password)->get()->first();
        if (isset($exists->name)) {
            session_start();
            $_SESSION['nome'] = $exists->name;
            $_SESSION['email'] = $exists->email;
            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }

    public function sair() {
        session_destroy();
        return redirect()->route('site.index');
    }
}

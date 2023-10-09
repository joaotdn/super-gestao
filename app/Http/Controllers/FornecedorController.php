<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request)
    {
        $fornecedores = Fornecedor::with(['produtos'])->where('nome', 'like', '%' . $request->input('nome') . '%')
            ->where('site', 'like', '%' . $request->input('site') . '%')
            ->where('uf', 'like', '%' . $request->input('uf') . '%')
            ->where('email', 'like', '%' . $request->input('email') . '%')
            ->paginate(2);

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(Request $request)
    {
        $msg = '';

        if ($request->input('_token') != '' && $request->input('id') == '') {
            $regras = [
                'nome' => 'required|min:3|max:40|unique:fornecedores',
                'site' => 'required|max:200',
                'uf' => 'required|min:2|max:2',
                'email' => 'email',
            ];

            $feedback = [
                'required' => 'O campo :attribute é obrigatório',
                'email' => 'O campo :attribute deve ser um email válido',
                'nome.min' => 'O campo nome deve ter 3 caracteres no minimo',
                'nome.max' => 'O campo nome deve ter 40 caracteres no máximo',
                'nome.unique' => 'Fornecedor com esse nome já foi cadastrado',
                'uf.min' => 'O campo uf deve ter 2 caracteres',
                'uf.max' => 'O campo uf deve ter 2 caracteres',
                'site.max' => 'O campo site deve ter no máximo 200 caracteres'
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg = 'Cadastro realizado com sucesso!';
        }

        if ($request->input('_token') != '' && $request->input('id') != '') {
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());
            if ($update) {
                $msg = 'Atualização realizada com sucesso';
            } else {
                $msg = 'Não foi possível realizar a atualização';
            }

            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msg' => $msg]);
        }

        return view('app.fornecedor.adicionar', ['msg' => $msg]);
    }

    public function editar(int $id, string $msg = '')
    {
        $fornecedor = Fornecedor::find($id);
        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
    }

    public function excluir(int $id)
    {
        Fornecedor::find($id)->delete();
        return redirect()->route('app.fornecedor', ['msg' => 'Item deletado com sucesso!']);
    }
}

<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use App\Item;
use App\Produto;
use App\ProdutoDetalhe;
use App\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Item::with(['itemDetalhe'])->paginate(2);
        return view('app.produto.index', ['produtos' => $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.create', ['unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            'nome' => 'required|min:10|max:200',
            'descricao' => 'required|min:10|max:500',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
        ];

        $feedback = [
            'required' => 'O ccampo :attribute é obrigatório',
            'nome.min' => 'O campo nome deve conter no minimo 10 caracteres',
            'nome.max' => 'O campo nome deve conter no máximo 200 caracteres',
            'descricao.min' => 'O campo descrição deve conter no minimo 10 caracteres',
            'descricao.max' => 'O campo descrição deve conter no máximo 500 caracteres',
            'peso.integer' => 'O campo peso deve ser um número inteiro',
            'unidade_id.exists' => 'O campo unidade id deve ser válido' ,
            'fornecedor_id.exists' => 'O campo Fornecedor deve ser válido' 
        ];

        $request->validate($regras, $feedback);

        Item::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.edit', ['produto' => $produto, 'unidades' => $unidades, 'fornecedores' => $fornecedores]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $produto)
    {
        $regras = [
            'nome' => 'required|min:10|max:200',
            'descricao' => 'required|min:10|max:500',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
            'fornecedor_id' => 'exists:fornecedores,id'
        ];

        $feedback = [
            'required' => 'O ccampo :attribute é obrigatório',
            'nome.min' => 'O campo nome deve conter no minimo 10 caracteres',
            'nome.max' => 'O campo nome deve conter no máximo 200 caracteres',
            'descricao.min' => 'O campo descrição deve conter no minimo 10 caracteres',
            'descricao.max' => 'O campo descrição deve conter no máximo 500 caracteres',
            'peso.integer' => 'O campo peso deve ser um número inteiro',
            'unidade_id.exists' => 'O campo unidade id deve ser válido' ,
            'fornecedor_id.exists' => 'O campo Fornecedor deve ser válido' 
        ];

        $request->validate($regras, $feedback);

        $produto->update($request->all());
        return redirect()->route('produto.show', ['produto' => $produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index');
    }
}

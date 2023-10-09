<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'produtos';
    protected $fillable = ['nome', 'descricao', 'peso', 'unidade_id', 'fornecedor_id'];

    // Relacionamento de 1 x 1
    public function itemDetalhe()
    {
        return $this->hasOne('App\ItemDetalhe', 'produto_id', 'id');
    }

    // Relacionamento de N x 1
    // Varios produtos podem estar relacionado a 1 fonecedor
    // 1 produto tem 1 fornecedor
    public function fornecedor()
    {
        return $this->belongsTo('App\Fornecedor');
    }

    // N x N
    // conectar o model Item q mapeia a tabela produtos
    // com pedidos
    public function pedidos()
    {
        return $this->belongsToMany('App\Pedido', 'pedidos_produtos', 'produto_id', 'pedido_id');
        /**
         * App\Pedido -> Model desse relacionamento
         * pedidos_produtos -> A tabela pivot, repesenta o relacionamento entre pedidos e produtos
         * ****(A baixo, os paramentros só foram necessarios devido ao uso de nomes nao padronizados para o mapeamento, nessse cado Item)
         * produto_id -> fk q representa a tabela mapeada pelo model de relacionamento (produtos)
         * pedido_id -> fk da tabela mapeada pelo model do relacionamento que estamos implementando (App\Pedido)
         */
    }
}

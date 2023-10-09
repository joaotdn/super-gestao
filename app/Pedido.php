<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = ['cliente_id'];

    public function produtos() {
        return $this->belongsToMany('App\Item', 'pedidos_produtos', 'pedido_id', 'produto_id')->withPivot('created_at', 'id', 'updated_at');
    }

    public function cliente() {
        return $this->belongsTo('App\Cliente', 'cliente_id');
    }
}

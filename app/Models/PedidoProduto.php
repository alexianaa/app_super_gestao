<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PedidoProduto extends Model
{
    protected $fillable = ['pedido_id','produto_id'];

    public function produtos() {
        return $this->belongsToMany(Produto::class, 'pedido_produtos');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome','descricao','peso','unidade_id','fornecedor_id'];

    public function produtoDetalhe() {
        return $this->hasOne(ProdutoDetalhe::class);
    }

    public function fornecedor() {
        return $this->belongsTo(Fornecedor::class);
    }

    public function pedidos() {
        return $this->belongsToMany(Pedido::class,'pedido_produtos','produto_id','pedido_id');
        // foreignPivotKey: id da model atual
        // relatedPivotKey: id da model utilizado no relacionamento
    }
}

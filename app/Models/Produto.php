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
}

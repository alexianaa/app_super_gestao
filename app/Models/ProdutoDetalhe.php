<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdutoDetalhe extends Model
{
    protected $fillable = ['comprimento','largura','altura','produto_id','unidade_id'];
}

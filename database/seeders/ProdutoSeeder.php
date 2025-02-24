<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produto;

class ProdutoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      Produto::create(['nome' => 'P1','descricao' => 'Produto 1', 'peso' => 10, 'unidade_id' => 1]);
      Produto::create(['nome' => 'P2','descricao' => 'Unidade 2', 'peso' => 2, 'unidade_id' => 2]);
      Produto::create(['nome' => 'P3','descricao' => 'Produto 3', 'peso' => 3, 'unidade_id' => 3]);
      Produto::create(['nome' => 'P4','descricao' => 'Produto 4', 'peso' => 42, 'unidade_id' => 1]);
      Produto::create(['nome' => 'P5','descricao' => 'Produto 5', 'peso' => 53, 'unidade_id' => 1]);
      Produto::create(['nome' => 'P6','descricao' => 'Produto 6', 'peso' => 61, 'unidade_id' => 2]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Unidade;

class UnidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      Unidade::create(['unidade' => 'Un1','descricao' => 'Unidade 1']);
      Unidade::create(['unidade' => 'Un2','descricao' => 'Unidade 2']);
      Unidade::create(['unidade' => 'Un3','descricao' => 'Unidade 3']);
    }
}

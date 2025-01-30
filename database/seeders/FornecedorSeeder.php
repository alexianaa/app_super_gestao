<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // instanciando
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 100';
        $fornecedor->site = 'fornecedor100.com.br';
        $fornecedor->email = 'fornecedor100@email.com';
        $fornecedor->uf = 'DF';
        $fornecedor->save();

        // metodo create que precisa do atributo fillable
        Fornecedor::create([
            'nome' => 'Fornecedor 200',
            'site' => 'fornecedor200.com.br',
            'email' => 'fornecedor200@email.com',
            'uf' => 'SP',
        ]);

        //insert (sem updated_at e created_at)
        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 300',
            'site' => 'fornecedor300.com.br',
            'email' => 'fornecedor300@email.com',
            'uf' => 'AL',
        ]);
    }
}

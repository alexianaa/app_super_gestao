<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('produtos', function (Blueprint $table) {

            $fornecedorId = DB::table('fornecedores')->insertGetId([
                'nome' => 'Fornecedor Padrao',
                'site' => 'fornecedorpadrao.com.br',
                'uf' => 'SP',
                'email' => 'fornecedorpadrao@example.com',
            ]);

            //$table->unsignedBigInteger('fornecedor_id')->default(56);
            //$table->foreign('fornecedor_id')->references('id')->on('fornecedores')->onDelete('restrict')->onUpdate('restrict');

            $table->foreignId('fornecedor_id')->default($fornecedorId)->constrained( 'fornecedores','id', 'produto_fornecedor_id')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropColumn('fornecedor_id');
        });
    }
};

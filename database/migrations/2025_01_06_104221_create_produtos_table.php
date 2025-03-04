<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produtos', function (Blueprint $table) {
            //$table->engine('InnoDB');
            //$table->charset('utf8mb4');
            //$table->collation('utf8mb4_unicode_ci');
            $table->comment('Lista de produtos');
            $table->id();
            $table->string('nome', '100');
            $table->text('descricao')->nullable();
            $table->integer('peso')->nullable();
            $table->decimal('preco_venda', 8, 2)->default(0.01);
            $table->integer('estoque_minimo')->default(1);
            $table->integer('estoque_maximo')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};

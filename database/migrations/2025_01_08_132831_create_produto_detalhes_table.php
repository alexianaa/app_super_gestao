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
        Schema::create('produtos_detalhes', function (Blueprint $table) {
            $table->id();
            $table->decimal('comprimento');
            $table->decimal('largura');
            $table->decimal('altura');
            $table->timestamps();

            //$table->unsignedBigInteger('produto_id');
            //$table->foreign('produto_id')->references('id')->on('produtos')->onDelete('cascade');
            $table->foreignId('produto_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->unique('produto_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos_detalhes');
    }
};

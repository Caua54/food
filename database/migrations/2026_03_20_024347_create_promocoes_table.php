<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // TABELA PROMOCOES
        Schema::create('promocoes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text('descricao')->nullable();
            $table->boolean('ativo')->default(true);
            $table->decimal('desconto', 8, 2)->nullable();
            $table->timestamps();
        });

        // PIVOT: produtos <-> promocoes
        Schema::create('produto_promocao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produto_id')->constrained()->cascadeOnDelete();
            $table->foreignId('promocao_id')->constrained('promocoes')->cascadeOnDelete();
            $table->timestamps();
        });

        // PIVOT: combos <-> promocoes
        Schema::create('combo_promocao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('combo_id')->constrained()->cascadeOnDelete();
            $table->foreignId('promocao_id')->constrained('promocoes')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('combo_promocao');
        Schema::dropIfExists('produto_promocao');
        Schema::dropIfExists('promocoes');
    }
};
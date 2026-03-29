<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produto_promocao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produto_id')->constrained('produtos')->cascadeOnDelete();
            $table->foreignId('promocao_id')->constrained('promocaos')->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['produto_id', 'promocao_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produto_promocao');
    }
};

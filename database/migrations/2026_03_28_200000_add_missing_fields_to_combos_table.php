<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('combos', function (Blueprint $table) {
            $table->text('descricao')->nullable()->after('nome');
            $table->string('imagem')->nullable()->after('preco');
            $table->boolean('ativo')->default(true)->after('imagem');
        });
    }

    public function down(): void
    {
        Schema::table('combos', function (Blueprint $table) {
            $table->dropColumn(['descricao', 'imagem', 'ativo']);
        });
    }
};

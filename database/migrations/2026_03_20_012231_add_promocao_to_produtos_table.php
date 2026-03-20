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
        $table->boolean('is_promocao')->default(false);
        $table->decimal('preco_promocional', 8, 2)->nullable();
    });
}

public function down(): void
{
    Schema::table('produtos', function (Blueprint $table) {
        $table->dropColumn(['is_promocao', 'preco_promocional']);
    });
}
};

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promocao extends Model
{
    protected $fillable = [
        'titulo',
        'descricao',
        'desconto',
        'ativo',
        'data_inicio',
        'data_fim',
    ];

    protected $casts = [
        'desconto' => 'decimal:2',
        'ativo' => 'boolean',
        'data_inicio' => 'date',
        'data_fim' => 'date',
    ];

    public function produtos()
    {
        return $this->belongsToMany(Produto::class, 'produto_promocao')->withTimestamps();
    }
}

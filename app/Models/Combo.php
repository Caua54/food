<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Combo extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'imagem',
        'ativo',
    ];

    protected $casts = [
        'ativo' => 'boolean',
        'preco' => 'float',
    ];
}

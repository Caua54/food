<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'categoria_id',
        'ativo',
        'imagem'
    ];

    // RELAÇÃO COM CATEGORIA (OK)
    public function categoria()
    {
        return $this->belongsTo(\App\Models\Categoria::class);
    }

    // 🔥 RELAÇÃO COM PROMOÇÕES (FALTAVA ISSO)
    public function promocoes()
    {
        return $this->belongsToMany(\App\Models\Promocao::class, 'produto_promocao')->withTimestamps();
    }
}

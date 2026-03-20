<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promocao extends Model
{
    public function produtos()
    {
        return $this->belongsToMany(\App\Models\Produto::class, 'produto_promocao');
    }
}
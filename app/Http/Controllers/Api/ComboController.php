<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Combo;

class ComboController extends Controller
{
    public function index()
    {
        return Combo::where('ativo', true)
            ->orderBy('nome')
            ->get(['id', 'nome', 'descricao', 'preco', 'imagem', 'ativo'])
            ->map(function ($combo) {
                return [
                    'id'       => $combo->id,
                    'nome'     => $combo->nome,
                    'descricao'=> $combo->descricao,
                    'preco'    => (float) $combo->preco,
                    'imagem'   => $combo->imagem,
                    'ativo'    => (bool) $combo->ativo,
                ];
            })
            ->values();
    }
}

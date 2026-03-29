<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Produto::where('ativo', 1)
            ->with([
                'categoria:id,nome',
                'promocoes' => function ($query) {
                    $query->where('ativo', true)
                        ->where(function ($q) {
                            $q->whereNull('data_inicio')->orWhereDate('data_inicio', '<=', now());
                        })
                        ->where(function ($q) {
                            $q->whereNull('data_fim')->orWhereDate('data_fim', '>=', now());
                        });
                },
            ])
            ->orderBy('categoria_id')
            ->orderBy('nome')
            ->get(['id', 'nome', 'preco', 'imagem', 'descricao', 'categoria_id', 'ativo'])
            ->map(function ($produto) {
                $precoOriginal = (float) $produto->preco;
                $desconto = (float) (($produto->promocoes ?? collect())->max('desconto') ?? 0);
                $precoFinal = max(0, $precoOriginal - $desconto);

                return [
                    'id' => $produto->id,
                    'nome' => $produto->nome,
                    'preco' => $precoFinal,
                    'precoOriginal' => $precoOriginal,
                    'imagem' => $produto->imagem,
                    'descricao' => $produto->descricao,
                    'categoria_id' => $produto->categoria_id,
                    'ativo' => (bool) $produto->ativo,
                ];
            })
            ->values();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        //
    }
}

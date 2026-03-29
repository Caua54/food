<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Produto;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class WelcomeController extends Controller
{
    public function index(): View
    {
        $categorias = Categoria::where('ativo', true)
            ->orderBy('nome')
            ->get(['id', 'nome']);
            
        $categoriasArray = $categorias->map(function ($cat) {
            return [
                'id' => $cat->id,
                'nome' => $cat->nome,
                'cor' => $this->getCategoryColor($cat->id)
            ];
        })->toArray();
        $categoriasArray = [['id' => 0, 'nome' => '👑 TUDO', 'cor' => 'gray'], ...$categoriasArray];

        $produtos = Produto::where('ativo', true)
            ->with([
                'categoria',
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
            ->get(['id', 'nome', 'preco', 'descricao', 'categoria_id', 'imagem', 'ativo'])
            ->map(function ($prod) {
                $precoFinal = $prod->preco;
                $promocoes = $prod->promocoes ?? collect();

                if ($promocoes->isNotEmpty()) {
                    $desconto = (float) ($promocoes->max('desconto') ?? 0);
                    $precoFinal = max(0, (float) $prod->preco - $desconto);
                }

                return [
                    'id' => $prod->id,
                    'nome' => $prod->nome,
                    'preco' => (float) $precoFinal,
                    'precoOriginal' => (float) $prod->preco,
                    'imagem' => $prod->imagem ? Storage::url($prod->imagem) : 'https://images.unsplash.com/photo-1513104890138-7c749659a591?w=400',
                    'descricao' => $prod->descricao ?? 'Produto delicioso',
                    'categoria_id' => $prod->categoria_id,
                    'categoria_nome' => $prod->categoria->nome ?? 'Sem categoria',
                    'has_promo' => $precoFinal < $prod->preco
                ];
            })->toArray();

        return view('welcome', compact('categoriasArray', 'produtos'));
    }

    private function getCategoryColor($id)
    {
        $colors = ['red', 'orange', 'blue', 'green', 'purple', 'pink', 'indigo', 'yellow'];
        return $colors[$id % count($colors)];
    }
}

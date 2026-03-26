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
            ->with('categoria')
            ->orderBy('categoria_id')
            ->orderBy('nome')
            ->get(['id', 'nome', 'preco', 'descricao', 'categoria_id', 'imagem', 'ativo'])
            ->map(function ($prod) {
                $precoFinal = $prod->preco;
                // Promoções safe (catch error se table não existir)
                try {
               $produtos = Produto::with(['promocoes' => function ($query) {
    $query->where('ativo', true);
}])->get();
                    if ($promocoes->isNotEmpty()) {
                        $desconto = $promocoes->min('desconto') ?? 0;
                        $precoFinal = max(0, $prod->preco - $desconto);
                    }
                } catch (\Exception $e) {
                    // Sem promocoes - preço normal
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
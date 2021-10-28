<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\Produto;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CardapioController extends Controller
{

    public function cardapioView()
    {
        return Inertia::render('Cardapio');
    }


    public function cardapioSorvetes()
    {
        return Produto::where([
            'produto_categoria' => 1,
            'produto_disponibilidade' => 1
        ])->get();
    }

    public function cardapioAcais()
    {
        return Produto::where('produto_categoria', 2)->get();
    }

    public function cardapioLanches()
    {
        return Produto::where('produto_categoria', 3)->get();
    }

    public function checkoutProduto($slug)
    {
        $produtoEncontrado = Produto::where('slug',$slug)->first();
        switch ($produtoEncontrado->produto_categoria){
            case 1:
                return inertia('ProdutoCheckout',[
                    'produto' => $produtoEncontrado,
                    'saboresSorvete' => ['morango', 'chocolate'],
                    'adicionaisSorverte' => ['ad1','ad2']
                ]);
            case 2:
                return inertia('ProdutoCheckout',[
                    'produto' => $produtoEncontrado,
                    'acompanhamentos' => ['ac1','ac2'],
                    'adicionais' => ['ad1','ad2']
                ]);
            case 3:
                return inertia('ProdutoCheckout',[
                    'acompanhamentos' => ['ac1','ac2']
                ]);
        }
    }


}

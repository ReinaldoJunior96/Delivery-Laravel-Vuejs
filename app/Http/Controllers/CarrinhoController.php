<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use App\Models\Produto;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function verCarrinho()
    {
        return inertia('Carrinho',[
            'ProdutosInCarrinho' => Carrinho::with('produto','usuario')->get()
        ]);
    }

    public function removerProduto($produto)
    {
        $produtoEncontrado = Carrinho::find($produto);
        $produtoEncontrado->delete();
        return redirect()->back();
    }
}

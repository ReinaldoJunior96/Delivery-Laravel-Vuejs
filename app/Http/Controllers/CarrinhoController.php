<?php

namespace App\Http\Controllers;

use App\Models\Carrinho;
use Illuminate\Http\Request;

class CarrinhoController extends Controller
{
    public function verCarrinho($usuario)
    {
        return inertia('Carrinho', [
            'ProdutosInCarrinho' => Carrinho::with('produto', 'usuario')
                ->where('usuario_carrinho', $usuario)
                ->get()
        ]);
    }

    public function adicionarProdAoCarrinho(Request $request)
    {
        Carrinho::create([
            'usuario_carrinho' => $request->usuario,
            'produto_carrinho' => $request->produto,
            'complemento_produto_carrinho' => $request->complemento,
            'valor_un_total' => $request->precoCheckout
        ]);
        return response('Success',200);
    }

    public function removerProduto($produto)
    {
        $produtoEncontrado = Carrinho::find($produto);
        $produtoEncontrado->delete();
        return redirect()->back();
    }

    public function produtoMeuCarrinho($usuario)
    {
        return response(Carrinho::with('produto', 'usuario')
            ->where('usuario_carrinho', $usuario)
            ->get()
        );

    }
}

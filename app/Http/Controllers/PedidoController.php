<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    public function cadastrarPedido(Request $request)
    {
        $produtoPedido = '';
        $countPedido = 1;
        foreach ($request->produtosCarrinho as $produto){
            $produtoPedido .=
                'Pedido numero '. $countPedido. ':
                '.$produto['produto']['produto_nome'] . ' // ';
            $countPedido++;
        }
        Pedido::create([
            'usuario_pedido' => Auth::user()->id,
            'produtos_pedido' => $produtoPedido,
            'troco_pedido' => $request->troco,
            'informacoes_entrega' => $request->informacoesEntrega,
            'valor_total' => $request->totalAPagar
        ]);
    }
}

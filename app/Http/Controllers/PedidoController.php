<?php

namespace App\Http\Controllers;

use App\Events\EnviarPedido;
use App\Models\Carrinho;
use App\Models\Pedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class PedidoController extends Controller
{
    public function cadastrarPedido(Request $request)
    {

        $codigoCarrinho = time();
        $produtoPedido = '';
        $countPedido = 1;
        foreach ($request->produtosCarrinho as $produto) {
            $carrinhoEncontrado = Carrinho::find($produto['id']);
            $carrinhoEncontrado->numero_carrinho = $codigoCarrinho;
            $carrinhoEncontrado->save();

            $produtoPedido .=
                'Item número ' . $countPedido . ':
                ' . $produto['produto']['produto_nome'] . ' // ';
            $countPedido++;
        }
        $pedidoEnviado = Pedido::create([
            'usuario_pedido' => Auth::user()->id,
            'produtos_pedido' => $produtoPedido,
            'numero_pedido' => $codigoCarrinho,
            'troco_pedido' => $request->troco,
            'informacoes_entrega' => $request->informacoesEntrega,
            'valor_total' => $request->totalAPagar,
            'status_pedido' => 0
        ]);
        $usuarioTemp = Auth::user();

        $pedidoEnviado['usuario'] = $usuarioTemp;

        $pedidoDespachado = $pedidoEnviado;

        EnviarPedido::dispatch($pedidoDespachado, 1);

        return redirect()->route('meus.pedidos', Auth::user()->id);
    }

    public function meusPedidos($usuario)
    {
        $pedidosUsuario = Pedido::where(
            [
                'usuario_pedido' => $usuario,

            ]
        )->orderBy('created_at', 'desc')->get();

        return Inertia::render('Meus-Pedidos',[
            'pedidosDoUsuario' => $pedidosUsuario
        ]);
    }
}

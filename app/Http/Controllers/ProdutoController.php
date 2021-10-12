<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{


    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        Produto::create([
            'produto_nome' => $request->nome,
            'produto_preco' => $request->preco,
            'produto_categoria' => $request->categoria,
            'produto_disponibilidade' => $request->disponibilidade,
            'produto_descricao' => $request->descricao
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $sorveteEncontrado = Produto::find($id);
        $sorveteEncontrado->produto_disponibilidade = $request->produto_disponibilidade;
        $sorveteEncontrado->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $sorveteEncontrado = Produto::find($id);
        $sorveteEncontrado->delete();
        return redirect()->back();
    }
}

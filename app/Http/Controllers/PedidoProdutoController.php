<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Produto;
use App\Models\PedidoProduto;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Pedido $pedido)
    {
        $pedido->with(['cliente', 'produtos']);
        $produtos = Produto::all();
        return view('app.pedido_produto.create', ['pedido' => $pedido, 'produtos' => $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Pedido $pedido)
    {
        $regras = ['produto_id' => 'exists:produtos,id', 'quantidade' => 'required'];
        $feedback = ['exists' => 'O produto informado não existe','required' => 'O campo :attribute deve ter um valor válido'];
        $request->validate($regras,$feedback);

        //PedidoProduto::create(['pedido_id' => $pedido->id, 'produto_id' => $request->get('produto_id')]);

        // $pedido->produtos()->attach($request->get('produto_id'), [
        //     'quantidade' => $request->get('quantidade')
        // ]);

        $pedido->produtos()->attach([
            $request->get('produto_id') => [
                'quantidade' => $request->get('quantidade')
            ]
        ]);

        return redirect()->route('pedido-produto.create', ['pedido' => $pedido]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PedidoProduto $pedido_produto, $pedido_id)
    {
        /* PedidoProduto::where([
            'produto_id' => $produto->id,
            'pedido_id' => $pedido->id
        ])->delete(); */

        // $pedido->produtos()->detach($produto->id);

        $pedido_produto->delete();

        return redirect()->route('pedido-produto.create', ['pedido' => $pedido_id]);
    }
}

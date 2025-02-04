<?php

namespace App\Http\Controllers;

use App\Models\SiteContato;
use App\Models\MotivoContato;
use Illuminate\Http\Request;
use App\Http\Requests\ContatoRequest;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {
        $motivos_contato = MotivoContato::all();

        return view('site.contato', ['motivos_contato' => $motivos_contato]);
    }

    public function salvar(ContatoRequest $request)
    {
        $request->validated();
        SiteContato::create($request->all());

        // ideia: redirecionar para página de confirmação
        return redirect()->route('site.index');
    }
}

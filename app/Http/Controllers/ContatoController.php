<?php

namespace App\Http\Controllers;

use App\Models\SiteContato;
use App\Models\MotivoContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {
        $motivos_contato = MotivoContato::all();

        return view('site.contato', ['motivos_contato' => $motivos_contato]);
    }

    public function salvar(Request $request)
    {
        $request->validate([
            'name' => 'required | min:3 | max:50', // unique:site_contatos
            'motivo_contato_id' => 'required',
            'telefone' => 'required',
            'mensagem' => 'required | max:2000',
            'email' => 'email',
        ]);
        SiteContato::create($request->all());

        // ideia: redirecionar para página de confirmação
        return redirect()->route('site.index');
    }
}

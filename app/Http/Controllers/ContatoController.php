<?php

namespace App\Http\Controllers;

use App\Models\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {
        return view('site.contato');
    }

    public function salvar(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'motivo_contato' => 'required',
            'telefone' => 'required',
            'mensagem' => 'required',
            'email' => 'required',
        ]);
        SiteContato::create($request->all());
        return view('site.contato');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(Request $request)
    {
        $motivos_contato = [
            1 => 'Dúvida',
            2 => 'Elogio',
            3 => 'Reclamação'
        ];

        return view('site.contato', ['motivos_contato' => $motivos_contato]);
    }

    public function salvar(Request $request)
    {
        $request->validate([
            'name' => 'required | min:3 | max:50',
            'motivo_contato' => 'required',
            'telefone' => 'required',
            'mensagem' => 'required | max:2000',
            'email' => 'required',
        ]);
        SiteContato::create($request->all());
        return view('site.contato');
    }
}

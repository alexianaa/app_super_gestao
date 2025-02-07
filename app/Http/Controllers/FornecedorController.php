<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request)
    {
        $fornecedores = "";
        if ($request->input('_token')) {
            $fornecedores = Fornecedor::where('nome', 'like', "%" . $request->input('nome') . "%")
                ->where('site', 'like', "%" . $request->input('site') . "%")
                ->where('email', 'like', "%" . $request->input('email') . "%")
                ->where('uf', 'like', "%" . $request->input('uf') . "%")
                ->get();
        }
        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores]);
    }

    public function adicionar(Request $request)
    {
        $message = "";
        if ($request->input('_token')) {
            $rules = [
                'nome' => 'required | min:3 | max:50',
                'email' => 'email',
                'uf' => 'required | size:2 ',
                'site' => 'required | max:150',
            ];
            $messages = [
                'email.email' => 'O email informado não é valido',
                'required' => 'O campo :attribute deve ser preenchido',
                'min' => 'O campo :attribute deve ter no mínimo :min caracteres',
                'max' => 'O campo :attribute deve ter no mínimo :max caracteres',
                'size' => 'O campo :attribute deve ter :size caracteres'
            ];
            $request->validate($rules, $messages);
            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());
            $message = 'Cadastro realizado com sucesso';
        }
        return view('app.fornecedor.adicionar', ['message' => $message]);
    }
}

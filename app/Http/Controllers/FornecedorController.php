<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = [
            0 => ['nome' => 'Fornecedor 1', 'status' => 'S'],
            1 => ['nome' => 'Fornecedor 2', 'status' => 'N'],
        ];
        return view('app.fornecedor', compact('fornecedores'));
    }
}

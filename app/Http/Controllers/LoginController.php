<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = $request->get('erro');
        if ($erro == 1)
            $erro = 'Email e/ou senha incorretos';
        else if ($erro == 2)
            $erro = 'Necessário realizar login para ter acesso a página';
        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
    }

    public function autenticar(Request $request)
    {
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        $feedback = [
            'required' => ':attribute é obrigatória',
            'email' => 'email precisa estar em um formato válido',
        ];

        $request->validate($regras, $feedback);

        $user = new User();
        $usuario = $user
            ->where('email', $request->get('usuario'))
            ->where('password', $request->get('senha'))
            ->get()
            ->first();

        if (isset($usuario->name)) {
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }


    }

    public function sair()
    {
        session_destroy();
        return redirect()->route('site.index');
    }

}

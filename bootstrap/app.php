<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\LogAcessoMiddleware;
use App\Http\Middleware\AutenticacaoMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // $middleware->web(append: [
        //     LogAcessoMiddleware::class,
        // ]);
    
        $middleware->alias([
            'autenticacao' => AutenticacaoMiddleware::class,
            'log.acesso' => LogAcessoMiddleware::class
        ]);

        $middleware->prependToGroup('group-name', [
            LogAcessoMiddleware::class,
            AutenticacaoMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

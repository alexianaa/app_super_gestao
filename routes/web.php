<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\FornecedorController;
use App\Http\Middleware\LogAcessoMiddleware;

Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobre-nos', [SobreNosController::class, 'sobrenos'])->name('site.sobrenos');
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.salvar');

Route::get('/login', function () {
  return 'login';
})->name('site.login');

// Route::get('/teste/{p1}/{p2}', [TesteController::class, 'teste'])->name('site.teste');

Route::middleware('autenticacao:negado')->prefix('/app')->group(function () {

  Route::get('/clientes', function () {
    return 'clientes';
  })->name('app.clientes');

  Route::get('/fornecedores', [FornecedorController::class, 'index'])->name('app.fornecedores');

  Route::get('/produtos', function () {
    return 'produtos';
  })->name('app.produtos');

});

Route::fallback(function () {
  return 'A rota não existe. <a href="/" >clique aqui</a> para voltar a página inicial.';
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ClienteController;

Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobre-nos', [SobreNosController::class, 'sobrenos'])->name('site.sobrenos');
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class, 'salvar'])->name('site.salvar');

Route::get('/login/{erro?}', [LoginController::class, 'index'])->name('site.login');
Route::post('/login', [LoginController::class, 'autenticar'])->name('site.login');

// Route::get('/teste/{p1}/{p2}', [TesteController::class, 'teste'])->name('site.teste');

Route::middleware('autenticacao:negado')->prefix('/app')->group(function () {

  Route::get('/home', [HomeController::class, 'index'])->name('app.home');
  Route::get('/sair', [LoginController::class, 'sair'])->name('app.sair');
  Route::get('/cliente', [ClienteController::class, 'index'])->name('app.cliente');

  Route::get('/fornecedor', [FornecedorController::class, 'index'])->name('app.fornecedor');
  Route::post('/fornecedor/listar', [FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
  Route::get('/fornecedor/listar', [FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
  Route::get('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
  Route::post('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
  Route::get('/fornecedor/editar/{id}/{message?}', [FornecedorController::class, 'editar'])->name('app.fornecedor.editar');
  Route::get('/fornecedor/excluir/{id}', [FornecedorController::class, 'excluir'])->name('app.fornecedor.excluir');

  //Route::get('/produto', [ProdutoController::class, 'index'])->name('app.produto');
  Route::resource('produto',ProdutoController::class);


});

Route::fallback(function () {
  return 'A rota não existe. <a href="/" >clique aqui</a> para voltar a página inicial.';
});
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
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PedidoProdutoController;
use App\Http\Controllers\ProdutoDetalheController;

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

  Route::get('/fornecedor', [FornecedorController::class, 'index'])->name('app.fornecedor');
  Route::post('/fornecedor/listar', [FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
  Route::get('/fornecedor/listar', [FornecedorController::class, 'listar'])->name('app.fornecedor.listar');
  Route::get('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
  Route::post('/fornecedor/adicionar', [FornecedorController::class, 'adicionar'])->name('app.fornecedor.adicionar');
  Route::get('/fornecedor/editar/{id}/{message?}', [FornecedorController::class, 'editar'])->name('app.fornecedor.editar');
  Route::get('/fornecedor/excluir/{id}', [FornecedorController::class, 'excluir'])->name('app.fornecedor.excluir');

  //Route::get('/produto', [ProdutoController::class, 'index'])->name('app.produto');
  Route::resource('produto',ProdutoController::class);
  Route::resource('produto_detalhe',ProdutoDetalheController::class);
  Route::resource('cliente',ClienteController::class);
  Route::resource('pedido',PedidoController::class);
  // Route::resource('pedido_produto',PedidoProdutoController::class);

  Route::get('pedido-produto/create/{pedido}',[PedidoProdutoController::class, 'create'])->name('pedido-produto.create');
  Route::post('pedido-produto/store/{pedido}',[PedidoProdutoController::class, 'store'])->name('pedido-produto.store');
  Route::delete('pedido-produto/destroy/{pedido_produto}/{pedido_id}',[PedidoProdutoController::class, 'destroy'])->name('pedido-produto.destroy');

});

Route::fallback(function () {
  return 'A rota não existe. <a href="/" >clique aqui</a> para voltar a página inicial.';
});
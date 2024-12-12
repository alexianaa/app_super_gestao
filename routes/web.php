<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;

Route::get('/', [PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])->name('site.sobreNos');
Route::get('/contato', [ContatoController::class, 'contato'])->name('site.contato');
Route::get('/login', function () {
  return 'login';
})->name('site.login');

Route::get('/rota1', function () {
  return 'Rota 1';
})->name('site.rota1');

Route::get('/rota2', function () {
  return redirect()->route('site.rota1');
})->name('site.rota2');
// Route::redirect('/rota2', 'rota1');

Route::prefix('/app')->group(function () {
  Route::get('/clientes', function () {
    return 'clientes';
  })->name('app.clientes');
  Route::get('/fornecedores', function () {
    return 'fornecedores';
  })->name('app.fornecedores');
  ;
  Route::get('/produtos', function () {
    return 'produtos';
  })->name('app.produtos');
});


// passando parametros
Route::get('/contato/{id}', function (string $id) {
  return "User $id";
})->whereNumber('id');

// parametros opcionais
Route::get('/user/{name?}', function (?string $name = null) {
  return $name;
})->whereAlpha('name');

// expressoes regulares
Route::get('/number/{id?}', function (int $id) {
  return "numero = $id";
})->where('id', '[0-9]+');
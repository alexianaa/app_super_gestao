<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;

Route::get('/', [PrincipalController::class, 'principal']);
Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos']);
Route::get('/contato', [ContatoController::class, 'contato']);

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
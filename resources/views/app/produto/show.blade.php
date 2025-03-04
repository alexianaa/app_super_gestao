@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina2">Produto - visualizar</div>
        <div class="menu">
            <ul>
              <li><a href="{{ route('produto.index') }}">Voltar</a></li>
              <li><a href="{{ route('produto.index') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <table border="1" style="text-align: left">
              <tr>
                <td>ID:</td>
                <td>{{$produto->id}}</td>
              </tr>
              <tr>
                <td>Nome:</td>
                <td>{{$produto->nome}}</td>
              </tr>
              <tr>
                <td>Peso:</td>
                <td>{{$produto->peso}}</td>
              </tr>
              <tr>
                <td>Descricao:</td>
                <td>{{$produto->descricao}}</td>
              </tr>
              <tr>
                <td>Unidade de Medida:</td>
                <td>{{$produto->unidade_id}}</td>
              </tr>
              <tr>
                <td>Fornecedor:</td>
                <td>{{$produto->fornecedor_id}}</td>
              </tr>
            </table>
        </div>

        {{-- @if ($message)
          <div>{{$message}}</div>
        @endif --}}

    </div>

@endsection

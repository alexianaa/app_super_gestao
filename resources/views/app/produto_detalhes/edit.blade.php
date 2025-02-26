@extends('app.layouts.basico')

@section('titulo', 'Detalhes do Produto')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            Editar Detalhes do Produto
        </div>
        <div class="menu">
            <ul>
              <li><a href="{{ route('produto_detalhe.index') }}">Voltar</a></li>
            </ul>
        </div>
        <div>
            <h4>Produto</h4>
            <div>Nome: {{$produto_detalhe->produto->nome ?? ''}}</div>
            <br>
            <div>Descricao: {{$produto_detalhe->produto->descricao ?? ''}}</div>
            <br>
        </div>
        <div class="informacao-pagina">


            @component('app.produto_detalhes._components.form_create_edit',['unidades' => $unidades, 'produtos' => $produtos, 'produto_detalhe' => $produto_detalhe])
            @endcomponent
        </div>

        {{-- @if ($message)
          <div>{{$message}}</div>
        @endif --}}

    </div>

@endsection

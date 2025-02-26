@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            Adicionar Produto
        </div>
        <div class="menu">
            <ul>
              <li><a href="{{ route('produto.index') }}">Voltar</a></li>
              <li><a href="{{ route('produto.index') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            @component('app.produto._components.form_create_edit',['unidades' => $unidades])
            
            @endcomponent
        </div>

        {{-- @if ($message)
          <div>{{$message}}</div>
        @endif --}}

    </div>

@endsection

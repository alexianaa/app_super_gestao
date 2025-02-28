@extends('app.layouts.basico')

@section('titulo', 'pedido')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            Adicionar pedido
        </div>
        <div class="menu">
            <ul>
              <li><a href="{{ route('pedido.index') }}">Voltar</a></li>
              <li><a href="{{ route('pedido.index') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            @component('app.pedido._components.form_create_edit',['clientes' => $clientes])
            
            @endcomponent
        </div>

        {{-- @if ($message)
          <div>{{$message}}</div>
        @endif --}}

    </div>

@endsection

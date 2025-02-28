@extends('app.layouts.basico')

@section('titulo', 'cliente')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            Editar cliente
        </div>
        <div class="menu">
            <ul>
              <li><a href="{{ route('cliente.index') }}">Voltar</a></li>
              <li><a href="{{ route('cliente.index') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            @component('app.cliente._components.form_create_edit',['cliente' => $cliente])
            
            @endcomponent
        </div>

        {{-- @if ($message)
          <div>{{$message}}</div>
        @endif --}}

    </div>

@endsection

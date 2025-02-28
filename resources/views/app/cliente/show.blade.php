@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina2">Visualizar cliente</div>
        <div class="menu">
            <ul>
              <li><a href="{{ route('cliente.index') }}">Voltar</a></li>
              <li><a href="{{ route('cliente.index') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <table border="1" style="text-align: left">
              <tr>
                <td>ID:</td>
                <td>{{$cliente->id}}</td>
              </tr>
              <tr>
                <td>Nome:</td>
                <td>{{$cliente->nome}}</td>
              </tr>
            </table>
        </div>

        {{-- @if ($message)
          <div>{{$message}}</div>
        @endif --}}

    </div>

@endsection

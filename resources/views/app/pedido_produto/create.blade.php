@extends('app.layouts.basico')

@section('titulo', 'pedido-produto')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina2">
            Adicionar produtos ao pedido
        </div>
        <div class="menu">
            <ul>
            </ul>
        </div>
        <div class="informacao-pagina">
            <h4>Detalhes do pedido</h4>
            <p>ID do pedido: {{$pedido->id}} </p>
            <p>Cliente: {{$pedido->cliente->nome}} </p>

            <div style="width: 100%; display: flex; flex-direction: column; align-items: center; justify-content: center;">
              <h4>Itens do Pedido</h4>

              <table border="1" style="width:20%">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nome do produto</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($pedido->produtos as $produto)
                    <tr>
                      <td>{{ $produto->id }}</td>
                      <td>{{ $produto->nome }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

              @component('app.pedido_produto._components.form_create',['pedido' => $pedido, 'produtos' => $produtos])
              
              @endcomponent
            </div>

        </div>

        {{-- @if ($message)
          <div>{{$message}}</div>
        @endif --}}

    </div>

@endsection

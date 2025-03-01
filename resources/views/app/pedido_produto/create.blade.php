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

              <table border="1" style="width:40%">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nome do produto</th>
                    <th>Quantidade</th>
                    <th>Data de inclusão</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($pedido->produtos as $produto)
                    <tr>
                      <td>{{ $produto->pivot->id }}</td>
                      <td>{{ $produto->nome }}</td>
                      <td>{{ $produto->pivot->quantidade }}</td>
                      <td>{{ $produto->pivot->created_at->format('d/m/Y') }}</td>
                      <td>
                        <form id="form_{{ $produto->pivot->id }}" method="post" action="{{ route('pedido-produto.destroy', ['pedido_produto' => $produto->pivot->id, 'pedido_id' => $pedido->id]) }}">
                          @method('DELETE')
                          @csrf
                          <a href="#" onclick="document.getElementById('form_{{ $produto->pivot->id }}').submit()">Excluir</a>
                          <p>
                        </form>
                      </td>
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

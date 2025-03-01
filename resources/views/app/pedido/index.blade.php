@extends('app.layouts.basico')

@section('titulo', 'Pedido')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina2">Listagem de Pedidos</div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('pedido.create') }}">Novo</a></li>
                <li><a href="{{ route('pedido.index') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
        <table border="1" width="90%">
            <thead>
            <tr>
                <th>Pedido</th>
                <th>Cliente</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>

            <tbody>
            @foreach ($pedidos as $pedido)
                <tr>
                <td>{{$pedido->id}}</td>  
                <td>{{$pedido->cliente->nome}}</td>  
                <td><a href={{route('pedido-produto.create', ['pedido' => $pedido->id])}} >adicionar produtos</a></td>  
                <td>
                    <form  id="form_{{ $pedido->id }}" method="post" action="{{ route('pedido.destroy', ['pedido' => $pedido->id]) }}">
                        @method('DELETE')
                        @csrf
                        <a href="#" onclick="document.getElementById('form_{{ $pedido->id }}').submit()">Excluir</a>
                        <p>
                    </form>
                </td>
                <td><a href={{route('pedido.edit', [$pedido->id])}}>editar</a></td>
                <td><a href={{route('pedido.show', [$pedido->id])}}>visualizar</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>

        {{ $pedidos->appends($request)->links() }}

        <br/>

        Exibindo {{ $pedidos->count() }} pedidos de {{ $pedidos->total() }} 
        (de {{$pedidos->firstItem()}} a {{$pedidos->lastItem()}} )

    </div>
@endsection

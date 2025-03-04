@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina2">Listagem de Produto</div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('produto.create') }}">Novo</a></li>
                <li><a href="{{ route('produto.index') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
        <table border="1" width="90%">
            <thead>
            <tr>
                <th>Nome</th>
                <th>Descricao</th>
                <th>Peso</th>
                <th>Fornecedor</th>
                <th>Site Fornecedor</th>
                <th>Unidade ID</th>
                <th>Comprimento</th>
                <th>Altura</th>
                <th>Largura</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>

            <tbody>
            @foreach ($produtos as $produto)
                <tr>
                <td>{{$produto->nome}}</td>
                <td>{{$produto->descricao}}</td>
                <td>{{$produto->peso}}</td>
                <td>{{$produto->fornecedor->nome}}</td>
                <td>{{$produto->fornecedor->site}}</td>
                <td>{{$produto->unidade_id}}</td>   
                <td>{{$produto->produtoDetalhe->comprimento ?? ''}}</td>   
                <td>{{$produto->produtoDetalhe->altura ?? ''}}</td>   
                <td>{{$produto->produtoDetalhe->largura ?? ''}}</td>   
                <td>
                    <form  id="form_{{ $produto->id }}" method="post" action="{{ route('produto.destroy', ['produto' => $produto->id]) }}">
                        @method('DELETE')
                        @csrf
                        <a href="#" onclick="document.getElementById('form_{{ $produto->id }}').submit()">Excluir</a>
                        <p>
                    </form>
                </td>
                <td><a href={{route('produto.edit', [$produto->id])}}>editar</a></td>
                <td><a href={{route('produto.show', [$produto->id])}}>visualizar</a></td>
                </tr>

                <tr>
                    <td colspan="12">
                        <p>Pedidos</p>
                        @foreach ($produto->pedidos as $pedido)
                            <a href="{{ route('pedido-produto.create', ['pedido' => $pedido->id]) }}">
                            Pedido {{ $pedido->id }}
                            </a> <br/>
                        @endforeach
                    </a>
                </tr>
            @endforeach
            </tbody>
        </table>

        
        </div>

        {{ $produtos->appends($request)->links() }}

        <br/>

        Exibindo {{ $produtos->count() }} produtos de {{ $produtos->total() }} 
        (de {{$produtos->firstItem()}} a {{$produtos->lastItem()}} )

    </div>
@endsection

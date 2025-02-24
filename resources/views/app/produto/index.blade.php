@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina2">Produto - listar</div>
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
                <th>Unidade ID</th>
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
                <td>{{$produto->unidade_id}}</td>   
                <td><a href={{route('produto.destroy', $produto->id)}}>excluir</a></td>
                <td><a href={{route('produto.edit', $produto->id)}}>editar</a></td>
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

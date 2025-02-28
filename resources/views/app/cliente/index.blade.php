@extends('app.layouts.basico')

@section('titulo', 'Cliente')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina2">Listagem de Clientes</div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('cliente.create') }}">Novo</a></li>
                <li><a href="{{ route('cliente.index') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
        <table border="1" width="90%">
            <thead>
            <tr>
                <th>Nome</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>

            <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                <td>{{$cliente->nome}}</td>  
                <td>
                    <form method="post" action={{route('cliente.destroy', [$cliente->id])}}>
                        @method('DELETE')
                        @csrf
                        <button type="submit">Excluir</button>
                    </form>
                </td>
                <td><a href={{route('cliente.edit', [$cliente->id])}}>editar</a></td>
                <td><a href={{route('cliente.show', [$cliente->id])}}>visualizar</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>

        {{ $clientes->appends($request)->links() }}

        <br/>

        Exibindo {{ $clientes->count() }} clientes de {{ $clientes->total() }} 
        (de {{$clientes->firstItem()}} a {{$clientes->lastItem()}} )

    </div>
@endsection

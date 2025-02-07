@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina2">Fornecedor</div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <form method="post" action="{{ route('app.fornecedor.listar') }}">
                @csrf
                <input type="text" name="nome" class="borda-preta" placeholder="Nome">
                <input type="text" name="site" class="borda-preta" placeholder="site">
                <input type="text" name="uf" class="borda-preta" placeholder="uf">
                <input type="text" name="email" class="borda-preta" placeholder="email">
                <button type="submit" class="borda-preta">Pesquisar</button>
            </form>
        </div>

    </div>

    <div>
        <pre style="top: 0; width: 100%; background-color: red;">
            {{$errors}}
        </pre>
    </div>
@endsection

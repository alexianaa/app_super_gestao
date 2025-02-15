@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina2">Fornecedor - adicionar</div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <form method="post" action="{{ route('app.fornecedor.adicionar') }}">
                @csrf
                <input type="hidden" name="id" value="{{ $fornecedor->id ?? '' }}" >

                <input type="text" name="nome" class="borda-preta" placeholder="Nome" value={{$fornecedor->nome ?? old('nome')}}>
                @if ($errors->has('nome'))
                  <div>{{$errors->first('nome')}}</div>
                @endif

                <input type="text" name="site" class="borda-preta" placeholder="site" value={{$fornecedor->site ?? old('site')}}>
                @if ($errors->has('site'))
                  <div>{{$errors->first('site')}}</div>
                @endif

                <input type="text" name="uf" class="borda-preta" placeholder="uf" value={{$fornecedor->uf ?? old('uf')}}>
                @if ($errors->has('uf'))
                  <div>{{$errors->first('uf')}}</div>
                @endif

                <input type="text" name="email" class="borda-preta" placeholder="email" value={{$fornecedor->email ?? old('email')}}>
                @if ($errors->has('email'))
                  <div>{{$errors->first('email')}}</div>
                @endif

                <button type="submit" class="borda-preta">Cadastrar</button>
            </form>
        </div>

        @if ($message)
          <div>{{$message}}</div>
        @endif

    </div>

@endsection

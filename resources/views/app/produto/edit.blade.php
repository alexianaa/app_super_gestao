@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina2">Produto - editar</div>
        <div class="menu">
            <ul>
              <li><a href="{{ route('produto.index') }}">Voltar</a></li>
              <li><a href="{{ route('produto.index') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
            <form method="post" action="{{route('produto.update', ['produto' => $produto->id])}}">
                @csrf
                @method('PUT')

                <input type="hidden" name="id" value="{{ $produto->id ?? '' }}" >
                
                <input type="text" name="nome" class="borda-preta" placeholder="Nome" value={{$produto->nome ?? old('nome')}}>
                {{ $errors->has('nome') ? $errors->first('nome') : '' }}

                <input type="text" name="descricao" class="borda-preta" placeholder="descricao" value={{$produto->descricao ?? old('descricao')}}>
                {{ $errors->has('descricao') ? $errors->first('descricao') : '' }}
                
                <input type="number" name="peso" class="borda-preta" placeholder="peso" value={{$produto->peso ?? old('peso')}}>
                {{ $errors->has('peso') ? $errors->first('peso') : '' }}
                
                <select name="unidade_id">
                  <option  value=0 >Selecione a unidade</option>
                  @foreach ($unidades as $unidade)
                    <option value="{{$unidade->id}}" {{ ($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>{{$unidade->descricao}}</option>
                  @endforeach
                </select>
                {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
               
                <button type="submit" class="borda-preta">Atualizar</button>
            </form>
        </div>

        {{-- @if ($message)
          <div>{{$message}}</div>
        @endif --}}

    </div>

@endsection

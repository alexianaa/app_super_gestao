  @if(isset($produto_detalhe->id))
    <form method="post" action="{{route('produto_detalhe.update',['produto_detalhe' => $produto_detalhe->id])}}">
      @method('PUT')
  @else
    <form method="post" action="{{route('produto_detalhe.store')}}">
  @endif
    @csrf
    <input type="hidden" name="id" value="{{ $produto_detalhe->id ?? '' }}" >
    
    <input min="0" step=".01" type="number" name="comprimento" class="borda-preta" placeholder="comprimento" value={{$produto_detalhe->comprimento ?? old('comprimento')}}>
    {{ $errors->has('comprimento') ? $errors->first('comprimento') : '' }}

    <input min="0" step=".01" type="number" name="largura" class="borda-preta" placeholder="largura" value={{$produto_detalhe->largura ?? old('largura')}}>
    {{ $errors->has('largura') ? $errors->first('largura') : '' }}
    
    <input min="0" step=".01" type="number" name="altura" class="borda-preta" placeholder="altura" value={{$produto_detalhe->altura ?? old('altura')}}>
    {{ $errors->has('altura') ? $errors->first('altura') : '' }}
    
    <select name="produto_id">
      <option  value=0 >Selecione o Produto</option>
      @foreach ($produtos as $produto)
        <option value="{{$produto->id}}" {{ $produto_detalhe->produto_id == $produto->id ? 'selected' : (old('produto_id') == $produto->id ? 'selected' : '') }}>{{$produto->nome}}</option>
      @endforeach
    </select>
    {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

    <select name="unidade_id">
      <option  value=0 >Selecione a unidade</option>
      @foreach ($unidades as $unidade)
        <option value="{{$unidade->id}}" {{ $produto_detalhe->unidade_id ?? old('unidade_id') == $unidade->id ? 'selected' : '' }}>{{$unidade->descricao}}</option>
      @endforeach
    </select>
    {{ $errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
    
    <button type="submit" class="borda-preta">
      @if(isset($produto_detalhe->id))
        Atualizar
      @else
        Cadastrar
      @endif
      
    </button>
  </form>
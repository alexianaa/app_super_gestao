@if(isset($pedido->id))
  <form method="post" action="{{route('pedido.update',['pedido' => $pedido->id])}}">
    @method('PUT')
@else
  <form method="post" action="{{route('pedido.store')}}">
@endif
  @csrf
  <input type="hidden" name="id" value="{{ $pedido->id ?? '' }}" >
  
  <select name="cliente_id">
    <option  value=0 >Selecione o cliente</option>
    @foreach ($clientes as $cliente)
      <option value="{{$cliente->id}}" {{ ($produto->cliente_id ?? old('cliente_id')) == $cliente->id ? 'selected' : '' }}>{{$cliente->nome}}</option>
    @endforeach
  </select>
  {{ $errors->has('cliente_id') ? $errors->first('cliente_id') : '' }}
  
  <button type="submit" class="borda-preta">
    @if(isset($pedido->id))
      Atualizar
    @else
      Cadastrar
    @endif
    
  </button>
</form>
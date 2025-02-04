{{ $slot }}
<form action="{{ route('site.contato') }}" method="post">
  @csrf

  <input name="name" value="{{ old('name') }}" type="text" placeholder="Nome" class="{{$classe}}">
  @if ($errors->has('name'))
    <div>{{$errors->first('name')}}</div>
  @endif
  <br>

  <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="{{$classe}}">
  @if ($errors->has('telefone'))
    <div>{{$errors->first('telefone')}}</div>
  @endif
  <br>

  <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="{{$classe}}">
  @if ($errors->has('email'))
    <div>{{$errors->first('email')}}</div>
  @endif
  <br>

  <select name="motivo_contato_id" class="{{$classe}}">
    <option value="">Qual o motivo do contato?</option>
    @foreach ($motivos_contato as $motivo_contato)
    <option value="{{$motivo_contato->id}}" {{old("motivo_contato") == $motivo_contato->id ? 'selected' : ''}}>
      {{ $motivo_contato->motivo_contato }}
    </option>
  @endforeach
  </select>
  @if ($errors->has('motivo_contato_id'))
    <div>{{$errors->first('motivo_contato_id')}}</div>
  @endif
  <br>

  <textarea name="mensagem" value="{{ old('mensagem') }}" class="{{$classe}}"> {{ old("mensagem") ?? 'Preencha aqui a sua mensagem' }}
  </textarea>
  @if ($errors->has('mensagem'))
    <div>{{$errors->first('mensagem')}}</div>
  @endif
  <br>
  <button type="submit" class="{{$classe}}">ENVIAR</button>
</form>

<!-- @if($errors->any())
  <div style="position:absolute; top:0px; left:0px; width:100%; background:red;">
    @foreach ($errors->all() as $erro)
    {{ $erro }} <br />
  @endforeach
  </div>
@endif -->
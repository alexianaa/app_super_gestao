@extends('site.layouts.basico')

@section('titulo', 'Login')

@section('conteudo')

@include('site.layouts._partials.menu')

<div class="conteudo-pagina">
  <div class="titulo-pagina">
    <h1>Login</h1>
  </div>
  <div class="informacao-pagina">
    <div style="width:30%; margin-left: auto; margin-right: auto;">
      <form action={{ route('site.login') }} method="post">
        @csrf

        <input name="usuario" type="text" placeholder="Email do usuário" class="borda-preta" value={{old('usuario')}}>
        @if ($errors->has('usuario'))
      <div style="color:red;">{{$errors->first('usuario')}}</div>
    @endif

        <input name="senha" type="password" placeholder="Senha" class="borda-preta" value={{old('senha')}}>
        @if ($errors->has('senha'))
      <div style="color:red;">{{$errors->first('senha')}}</div>
    @endif

        <button type="submit" class="borda-preta">Acessar</button>
      </form>

      @if (isset($erro) && $erro != '' ? $erro : '')
      <div>{{$erro}}</div>
    @endif
    </div>
  </div>
</div>

@include('site.layouts._partials.rodape')

@endsection
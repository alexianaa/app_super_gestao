@extends('site.layouts.basico')

@section('titulo', 'Contato')

@section('conteudo')

@include('site.layouts._partials.menu')

<div class="conteudo-pagina">
    <div class="titulo-pagina">
        <h1>Entre em contato conosco</h1>
    </div>
    <div class="informacao-pagina">
        <div class="contato-principal">
            @component('site.layouts._components.form_contato', ['classe' => 'borda-preta', 'motivos_contato' => $motivos_contato])
            <p>Tempo de resposa médio é de 48h horas</p>
            @endcomponent
        </div>
    </div>
</div>

@include('site.layouts._partials.rodape')

@endsection
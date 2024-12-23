{{-- @dd($fornecedores); --}}

<h1>Fornecedores</h1>

@if(count($fornecedores) > 0 && count($fornecedores) < 10)
  <h3>Existem alguns fornecedores cadastrados</h3>
@elseif(count($fornecedores) > 10)
  <h3>Existem vários fornecedores cadastrados</h3>
@else
  <h3>Não existem fornecedores cadastrados</h3>
@endif

@unless($fornecedores[0]['status'] == 'S') <p>Condição não aceita</p>
@endunless
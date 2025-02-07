@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina2">Fornecedor - listar</div>
        <div class="menu">
            <ul>
                <li><a href="{{ route('app.fornecedor.adicionar') }}">Novo</a></li>
                <li><a href="{{ route('app.fornecedor') }}">Consulta</a></li>
            </ul>
        </div>
        <div class="informacao-pagina">
          <table border="1" width="90%">
            <thead>
              <tr>
                <th>Nome</th>
                <th>Site</th>
                <th>Email</th>
                <th>UF</th>
                <th></th>
                <th></th>
              </tr>
            </thead>

            <tbody>
              @foreach ($fornecedores as $fornecedor)
                <tr>
                  <td>{{$fornecedor->nome}}</td>
                  <td>{{$fornecedor->site}}</td>
                  <td>{{$fornecedor->email}}</td>
                  <td>{{$fornecedor->uf}}</td>
                  <td>excluir</td>
                  <td>editar</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

    </div>

@endsection

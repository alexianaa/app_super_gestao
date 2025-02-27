@extends('app.layouts.basico')

@section('titulo', 'Fornecedor')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina2">Listar Fornecedores</div>
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
                  <td><a href={{route('app.fornecedor.excluir', $fornecedor->id)}}>excluir</a></td>
                  <td><a href={{route('app.fornecedor.editar', $fornecedor->id)}}>editar</a></td>
                </tr>
                <tr>
                  <td colspan="6">
                      <p>Lista de Produtos</p>
                      <table border=1 style="margin: 20px">
                        <thread>
                          <tr>
                            <th>ID</th>
                            <th>Nome</th>
                          </tr>
                        </thread>
                        <tbody>
                          @foreach ($fornecedor->produtos as $key => $produto)
                            <tr>
                              <th>{{$produto->id}}</th>
                              <th>{{$produto->nome}}</th>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        {{ $fornecedores->appends($request)->links() }}

        <br/>

        Exibindo {{ $fornecedores->count() }} fornecedores de {{ $fornecedores->total() }} 
        (de {{$fornecedores->firstItem()}} a {{$fornecedores->lastItem()}} )

    </div>

@endsection

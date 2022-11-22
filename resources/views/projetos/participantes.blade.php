@extends('layouts.main')

@section('title', 'Projetos')

@section('content')
  <div class="col-md-10 offset-md-1 dashboard-title-container">
    <h2>SOLICITAÇÕES</h2>
  </div>
  <div class="col-md-10 offset-md-1 dashboard-events-container">
    @if (count($pendentes) > 0)
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col" class="text-center">Nome</th>
            <th scope="col" class="text-center">Situação</th>
            <th scope="col" class="text-center">Ações</span></th>
          </tr>
        </thead>
        @foreach ($pendentes as $pendentes)
          <tbody>
            <tr>
              <td class="text-center">{{ $pendentes->name }}</td>
              <td class="text-center">{{ $pendentes->situacao }}</td>
              <td class="text-center">
                <a href="/projetos/request/aceitar/{{ $pendentes->user_id }}" class="btn btn-primary">Aceitar</a>
                <a href="/projetos/participantes/recusar/{{ $pendentes->user_id }}"
                  class="btn btn-danger delete-btn">Recusar</a>
              </td>
            </tr>
        @endforeach
        </tbody>
      @else
        <p>Não há solicitações pendentes</p>
    @endif
    </table>
  </div>
  <div class="col-md-10 offset-md-1 dashboard-title-container">
    <h2>APROVADOS</h2>
  </div>
  <div class="col-md-10 offset-md-1 dashboard-events-container">
    @if (count($aprovados) > 0)
      <table class="table">
        <thead>
          <tr>
            <th scope="col" class="text-center">Nome</th>
            <th scope="col" class="text-center">Situação</th>
            <th scope="col" class="text-center">Ações</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($aprovados as $aprovados)
            <tr>
              <td class="text-center">{{ $aprovados->name }}</td>
              <td class="text-center">{{ $aprovados->situacao }}</td>
              <td class="text-center">
                <a href="" class="btn btn-primary">Chat</a>
                <a href="/projetos/participantes/recusar/{{ $aprovados->user_id }}"
                  class="btn btn-danger delete-btn">Retirar</a>
              </td>
            </tr>
        </tbody>
    @endforeach
  @else
    <p>Não há alunos aprovados</p>
    @endif
    </table>
  </div>

@endsection

@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus projetos</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($Projetos) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Participantes</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Projetos as $Projetos)
                <tr>
                    <td><a href="/projetos/{{ $Projetos->id }}">{{ $Projetos->name}}</a></td>
                    <td>{{count($Projetos->users)}}</td>
                    <td><a href="/projetos/edit/{{$Projetos->id}}" class="btn btn-primary">Editar</a> 
                        <form action="/projetos/{{$Projetos->id}}" method ="POST">
                            @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                            </form>
                </tr>
            @endforeach    
        </tbody>
    </table>
    @else
    <p>Você ainda não tem projetos, <a href="/projetos/create">criar projeto</a></p>
    @endif
</div>
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Projetos que estou participando</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
@if(count($projetosAsParticipant) > 0)
<table class="table">
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Participantes</th>
            <th scope="col">Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($projetosAsParticipant as $Projetos)
            <tr>
                <td><a href="/projetos/{{ $Projetos->id }}">{{ $Projetos->name}}</a></td>
                <td>{{count($Projetos->users)}}</td>
                <td>
                    <form action="/projetos/leave/{{$Projetos->id}}" method="POST">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger delete-btn">
                            <ion-icon name="trash-outline"></ion-icon>
                            Sair do projeto
                        </button>
                    </form>
                </td>
                </tr>
        @endforeach    
    </tbody>
</table>

@else
<p>Voce ainda não está cadastrado em nenhum projeto, <a href="/">Veja os projetos disponíveis</a></p>
@endif
</div>


@endsection

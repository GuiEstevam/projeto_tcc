@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>MEUS PROJETOS</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($Projetos) > 0)
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col"class = "text-center">Nome</th>
                    <th scope="col"class = "text-center">Participantes</th>
                    <th scope="col"colspan="2" class = "text-center">Ações</span></th>
                </tr>
            </thead>
            <tbody>
                @foreach($Projetos as $Projetos)
                    <tr>
                        <td class = "text-center"><a href="/projetos/{{ $Projetos->id }}">{{ $Projetos->name}}</a></td>
                        <td class = "text-center">{{count($Projetos->users)}}</td>
                        <td>
                            <a href="/projetos/participantes/{{$Projetos->id}}" class="btn btn-primary mt-2 ">Partipantes</a>
                            <a href="/projetos/edit/{{$Projetos->id}}" class="btn btn-primary mt-2 ml-1">Editar</a> 
                            <form action="/projetos/{{$Projetos->id}}" method ="POST">
                                @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete-btn mt-2"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach    
            </tbody>
        </table>
    @else
        <p>Você ainda não tem projetos, <a href="/projetos/create">criar projeto</a></p>
    @endif
</div>
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>PROJETOS QUE EU ESTOU PARTICIPANDO</h1>
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
                @foreach($projetosAsParticipant as $Projetos)
                    @if($Projetos->pivot->situacao == 1)
                        <tbody>
                            <tr>
                                <td><a href="/projetos/{{ $Projetos->id }}">{{ $Projetos->name}}</a></td>
                                <td>{{count($Projetos->users)}}</td>
                                <td>
                                    <a href="" class="btn btn-primary">Chat</a>
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
                        @else
                    <p> Há solicitações aguardando aprovação, você será notificado!</a></p>
                @endif            
             @endforeach    
            </tbody>
        </table>
    @else
        <p>Voce ainda não está cadastrado em nenhum projeto, <a href="/">Veja os projetos disponíveis</a></p>
    @endif
</div>
@endsection

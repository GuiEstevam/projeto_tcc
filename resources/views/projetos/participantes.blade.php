@extends('layouts.main')

@section('title', 'Projetos')

@section('content')
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" class = "text-center">Nome</th>
                    <th scope="col" class = "text-center">Participantes</th>
                    <th scope="col" class = "text-center">Ações</span></th>
                </tr>
            </thead>    
            <tbody>
            @if(count($pendentes) > 0)
                @foreach($pendentes as $pendentes)
                    <tr>
                        <td class = "text-center">{{$pendentes->name}}</td>
                        <td class = "text-center">{{$pendentes->situacao}}</td>
                        <td class = "text-center">
                            <a href="/projetos/participantes/aceitar/{{ $pendentes->user_id }}" class="btn btn-primary">Aceitar</a>
                            <a href="/projetos/participantes/recusar/{{ $pendentes->user_id }}" class="btn btn-danger delete-btn">Recusar</a>
                        </td>
                    </tr>
                @endforeach  
            </tbody>
            @else
            <p> Não há solicitações pendentes</p>
            @endif  
        </table>
                
    
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class = "text-center">Nome</th>
                    <th scope="col" class = "text-center">Situação</th>
                    <th scope="col" class = "text-center">Ações</th>
                </tr>        
            </thead>
            @if(count($aprovados) > 0)
                <tbody>
                    @foreach ($aprovados as $aprovados)
                    <tr>
                        <td class = "text-center">{{$aprovados->name}}</td>
                        <td class = "text-center">{{$aprovados->situacao}}</td>
                        <td class = "text-center">
                            <a href="" class="btn btn-primary">Chat</a>
                        </td>
                    </tr>
            @endforeach   
            @else
                <p> Não há alunos aprovados</p>

            @endif      
                </tbody>

            </table>
        
@endsection
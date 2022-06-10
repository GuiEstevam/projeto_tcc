@extends('layouts.main')

@section('title', 'Tags')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>TAGS disponíveis </h1><a href='/tags/create'>Criar</a>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($Tag) > 0)
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col" class = "text-center">Nome</th>
                <th scope="col">Ações</span></th>
            </tr>
        </thead>
        <tbody>
            @foreach($Tag as $Tag)
                <tr>
                    <td class = "text-center">{{ $Tag->name}}</td>
                    <td>
                        <a href="/projetos/edit/{{$Tag->id}}" class="btn btn-primary">Editar</a> 
                        <form action="/projetos/{{$Tag->id}}" method ="POST">
                            @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash-outline"></ion-icon> Deletar</button>
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


@endsection

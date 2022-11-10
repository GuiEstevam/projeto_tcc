@extends('layouts.main')

@section('title', 'Campus')

@section('content')
    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <div class="col-sm mt-3 text-right">
            <div class="btn-group" role="group">
                <a href="/campus/create">
                    <button class="btn btn-primary">
                        Criar
                    </button>
                </a>
            </div>
        </div>
        <h2>Campus disponíveis </h2>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
        @if (count($Campus) > 0)
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Número</th>
                        <th scope="col" class="text-center">Nome</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Campus as $Campus)
                        <tr>
                            <td class="text-center">{{ $Campus->id }}</td>
                            <td class="text-center">{{ $Campus->name }}</td>
                            <td>
                                <a href="/campus/edit/{{ $Campus->id }}" class="btn btn-primary">Editar</a>
                                <form action="/campus/{{ $Campus->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger delete-btn">
                                        <ion-icon name="trash-outline"></ion-icon> Deletar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Ainda não há campus cadastrados, <a href="/campus/create">crie um campus</a></p>
        @endif
    </div>
@endsection

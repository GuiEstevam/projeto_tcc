@extends('layouts.main')

@section('title', 'Tags')

@section('content')

    <div class="col-md-10 offset-md-1 dashboard-title-container">
        <div class="col-sm mt-3 text-right">
            <div class="btn-group" role="group">
                <a href="/tags/create">
                    <button class="btn btn-primary">
                        Criar
                    </button>
                </a>
            </div>
        </div>
        <h2>TAGS disponíveis </h2>
    </div>
    <div class="col-md-10 offset-md-1 dashboard-events-container">
        @if (count($Tag) > 0)
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">Número</th>
                        <th scope="col" class="text-center">Nome</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($Tag as $Tag)
                        <tr>
                            <td class="text-center">{{ $Tag->id }}</td>
                            <td class="text-center">{{ $Tag->name }}</td>
                            <td>
                                <a href="/tags/edit/{{ $Tag->id }}" class="btn btn-primary">Editar</a>
                                <form action="/tags/{{ $Tag->id }}" method="POST">
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
            <p>Você ainda não tem tags, <a href="/tags/create">criar tag</a></p>
        @endif
    </div>


@endsection

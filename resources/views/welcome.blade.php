@extends('layouts.main')

@section('title', 'Projetos')

@section('content')
    <div id="search-container" class="col-md-12">
        {{-- <h1>ENCONTRE UM PROJETO</h1> --}}
        <form action="">
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
        </form>
    </div>
    <div id="events-container" class="col-md-12">
        <h2>PROJETOS DISPONÍVEIS</h2>
        <p class="subtitle">Veja os projetos que estão disponíveis</p>
        <div id="cards-container" class="row">
            @foreach ($Projeto as $Projeto)
                <div class="card col-md-3">
                    <img src="/img/projects/{{ $Projeto->image }}" alt="{{ $Projeto->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $Projeto->name }}</h5>
                        <a href="/projetos/{{ $Projeto->id }}" class="btn btn-primary"> Saber mais </a>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

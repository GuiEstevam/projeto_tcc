@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Projetos</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($Projeto) > 0)
    @else
    <p>Você ainda não tem projetos <a href="/projetos/create">Criar projeto</a></p>
    @endif
</div>
@endsection

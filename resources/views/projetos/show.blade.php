@extends('layouts.main')

@section('title', $Projeto->name)

@section('content')
  <div class="col-md-10 offset-md-1">
    <div class="row">
      <div id="image-container" class="col-md-4">
        <img src="/img/projects/{{ $Projeto->image }}" class="img-fluid" alt="{{ $Projeto->name }}">
      </div>
      <div id="info-container" class="col-md-8">
        <h1>{{ $Projeto->name }}</h1>
        <p class="event-city">
          <ion-icon name="location-outline"></ion-icon>
          {{ $Projeto->campus }}
        </p>
        <p class="events-participants">
          <ion-icon name="people-outline"></ion-icon> {{ count($Projeto->users) }} Alunos
        </p>
        <p class="event-owner"><a href="/profile/show/{{ $ProjectOwner['id'] }}">
            <ion-icon name="star-outline"></ion-icon> Orientador: {{ $ProjectOwner['name'] }}
          </a></p>
        <ul id="profile-tags-list">
          @foreach ($Projeto->tags as $item)
            <li>
              <ion-icon name="play-outline"></ion-icon>{{ $item }}
            </li>
          @endforeach
        </ul>
        @if ($ProjectOwner['id'] == $user->id)
          <p class="already-joined-msg"> Você é o responsável deste projeto!</p>
        @elseif(!$hasUserJoined && !$hasUserApproved)
          <form action="/projetos/join/{{ $Projeto->id }}" method="POST">
            @csrf
            <a href="/projetos/join/{{ $Projeto->id }}" class="btn btn-primary" id="event-submit"
              onclick="Projeto.preventDefault();
            this.closest('form').submit();">
              Solicitar orientação
            </a>
          </form>
        @elseif($hasUserJoined && $hasUserApproved)
          <p class="already-joined-msg"> Você já está participando deste projeto</p>
        @else
          <p class="already-joined-msg"> Você esta aguardando aprovação neste projeto</p>
        @endif
      </div>
      <div class="col-md-12" id="description-container">
        <h3>Sobre o projeto:</h3>
        <p class="event-description">{{ $Projeto->description }}</p>
      </div>
    </div>
  </div>
@endsection

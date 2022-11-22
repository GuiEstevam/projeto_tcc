@extends('layouts.main')

@section('title', $User->name)

@section('content')
  <div class="col-md-10 offset-md-1">
    <div class="row">
      <div id="image-container" class="col-md-4">
        <img src="/img/profile_photo/{{ $Profile->profile_photo_path }}" class="img-fluid" alt="{{ $User->name }}">
      </div>
      <div id="profile-info-container" class="col-md-8">
        @if ($Profile->user_id == $Logged->id)
          <div class="row">
            <div class="edit-profile-button text-right">
              <a class="btn btn-primary" href="/profile/edit/{{ $Profile->id }}">
                Editar perfil
              </a>
            </div>
          </div>
        @endif
        <h1>{{ $User->name }}</h1>
        <p class="event-city">
          <ion-icon name="location-outline"></ion-icon> Campus: {{ $Profile->campus }}
        </p>
        @if ($User->role_id == 2)
          <p class="events-participants">
            <ion-icon name="people-outline"></ion-icon> Cursando: {{ $Profile->graduation }}
          </p>
          <p class="event-owner">
            <ion-icon name="star-outline"></ion-icon> Semestre: {{ $Profile->semester }}°
          </p>
        @elseif($User->role_id == 3)
          <p class="events-participants">
            <ion-icon name="people-outline"></ion-icon> Disciplina: {{ $Profile->graduation }}
          </p>
        @endif

        <h3>Tenho interesse em:</h3>
        <ul id="profile-tags-list">
          @foreach ($Profile->tags as $item)
            <li>
              <ion-icon name="play-outline"></ion-icon>{{ $item }}
            </li>
          @endforeach
        </ul>
        <div class="buttons-container">
          <p>
            <a class="btn btn-primary col-8" href="#" data-toggle="modal" data-target="#modalExperience">
              Experiências anteriores
            </a>
          </p>
          <p>
            @if ($Logged->id != $User->id)
              @if ($User->role_id == 3)
                <a class="btn btn-primary col-8 mt-2" href="#" data-toggle="modal" data-target="#modalRequest">
                  Solicitar orientação
                </a>
              @elseif($User->role_id == 2)
                <a class="btn btn-primary col-8 mt-2" href="#" data-toggle="modal" data-target="#modalRequest">
                  Oferecer orientação
                </a>
              @endif
            @endif
          </p>
        </div>
      </div>
      <div class="col-md-12" id="description-container">
        <h3>Sobre mim:</h3>
        <p class="profile-info-description">{{ $Profile->description }}</p>
      </div>
    </div>
  </div>
  {{-- Modal para visualização das experiências anteriores --}}
  <div class="modal fade" id="modalExperience" tabindex="-1" role="dialog" aria-labelledby="modalExperience"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ExperienceModalLabel">Experiências anteriores</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @foreach ($Experiences as $Experience)
            <p>{{ $Experience->experienceName }}</p>
            <p>Instituição: {{ $Experience->institutionName }}</p>
            <p>Data de inicio: {{ date('d/m/Y', strtotime($Experience->firstDate)) }}</p>
            <p>Data fim: {{ date('d/m/Y', strtotime($Experience->lastDate)) }}</p>
            <hr>
          @endforeach
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <div class="modal fade" id="modalRequest" tabindex="-1" role="dialog" aria-labelledby="modalRequest"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="RequestModalLabel">Solicitando para:</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form form action="/profile/request" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="form-group col-12">
            <label for="title">Solicitando para:</label>
            <input type="text" class="form-control" id="requestedUser" name="requestedUser"
              value={{$User->id}}>
          </div>
            @foreach ($LoggedProjects as $LoggedProject)
              <div class="form-group col-12">
                <label for="title">Selecione um projeto:</label>
                <select class="form-control" id="projectRequestId" name="projectRequest">
                  <option value="" disabled></option>
                  <option value="{{ $LoggedProject->id }}">{{ $LoggedProject->name }}</option>
                </select>
              </div>
            @endforeach
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button type="submit" class="btn btn-primary">Solicitar</button>
        </div>
        </form>
      </div>
    </div>
  </div>
@endsection

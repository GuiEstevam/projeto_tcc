@extends('layouts.main')

@section('title', 'Projetos')

@section('content')

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

  <div id="search-container" class="col-md-12">
    <form action="">
      <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
    </form>
  </div>

  <div class="container mt-3">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs nav-justified" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#home">PROJETOS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-bs-toggle="tab" href="#menu1">USUÁRIOS</a>
      </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      <div id="home" class="container tab-pane active"><br>
        <div id="events-container" class="col-md-12">
          @if ($search)
            <h2>Buscando por: {{ $search }}</h2>
          @else
            <h2>PROJETOS DISPONÍVEIS</h2>
            <p class="subtitle">Veja os projetos que estão disponíveis</p>
          @endif
          <div id="cards-container" class="row">
            @foreach ($projetos as $projeto)
              <div class="card col-md-3">
                <img src="/img/projects/{{ $projeto->image }}" alt="{{ $projeto->name }}">
                <div class="card-body">
                  <h5 class="card-title">{{ $projeto->name }}</h5>
                  <p class="card-participants">Tags:
                    @foreach ($projeto->tags as $item)
                    {{ $item }}
                    @endforeach
                  </p>
                  <a href="/projetos/{{ $projeto->id }}" class="btn btn-primary"> Saber mais </a>
                  </form>
                </div>
              </div>
            @endforeach
            @if (count($projetos) == 0 && $search)
              <p>Não foi possível encontrar nenhum projeto com {{ $search }}! <a href="/">Ver todos</a></p>
            @elseif(count($projetos) == 0)
              <p>Não há projetos disponíveis</p>
            @endif
          </div>
        </div>
      </div>
      <div id="menu1" class="container tab-pane fade"><br>
        <div id="events-container" class="col-md-12">
          @if ($search)
            <h2>Buscando por: {{ $search }}</h2>
          @else
            <h2>USUÁRIOS DISPONÍVEIS</h2>
            <p class="subtitle">Veja os usuários que estão disponíveis</p>
          @endif
          <div id="cards-container" class="row">
            @foreach ($users as $user)
              <div class="card col-md-3">
                <img src="/img/profile_photo/{{ $user->profile_photo_path }}" alt="{{ $user->user->name }}">
                <div class="card-body">
                  <h5 class="card-title">{{ $user->user->name }}</h5>
                  <p class="card-participants">Tags:
                    @foreach ($user->tags as $item)
                    {{ $item }}
                    @endforeach
                  </p>
                  <a href="/profile/show/{{ $user->id }}" class="btn btn-primary"> Saber mais </a>
                  </form>
                </div>
              </div>
            @endforeach
            @if (count($users) == 0 && $search)
              <p>Não foi possível encontrar nenhum evento com {{ $search }}! <a href="/">Ver todos</a></p>
            @elseif(count($users) == 0)
              <p>Não há usuários disponíveis</p>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Tabs content -->
@endsection

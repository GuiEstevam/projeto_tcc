<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

{{-- @dd($Tag) --}}
@extends('layouts.main')

@section('title', 'Editando: ' . $Projeto->name)

@section('content')
  <div id="event-create-container" class="col-md-6 offset-md-3">
    <h4>Editando: {{ $Projeto->name }} </h4>
    <form action="/projetos/update/{{ $Projeto->id }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-group col-12">
        <label for="profile_photo_path">Coloque uma imagem de perfil:</label>
        <input type="file" id="image" name="image" class="form-control">
        <img src="/img/projects/{{ $Projeto->image }}" alt="{{ $Projeto->name }}" class="profile-photo-preview">
      </div>
      <div class="form-group">
        <label for="title">Nome:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nome do projeto"
          value="{{ $Projeto->name }}">
      </div>
      <div class="form-group">
        <label for="title">Campus</label>
        <select class="form-control" id="campus" name="campus" placeholder="Campus onde será realizado">
          @foreach ($Campus as $Campus)
            <option value="{{ $Campus->name }}">{{ $Campus->name }}</option>
          @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="title">Descreva o seu projeto:</label>
        <textarea name="description" id="description" class="form-control" placeholder="Descrição do projeto"> {{ $Projeto->description }} </textarea>
      </div>
      <div class="form-group">
        <label for="title">Tags:</label>
        <select class="form-control col-12" multiple data-live-search="true" title="Selecione as TAGS" name="tags[]">
          @foreach ($Tags as $Tags)
            <option value="{{ $Tags->name }}">{{ $Tags->name }}</option>
          @endforeach
        </select>
      </div>
      <input type="submit" class="btn btn-primary" value="Editar Projeto">
    </form>
  </div>

@endsection

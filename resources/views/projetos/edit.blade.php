<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

{{-- @dd($Tag) --}}
@extends('layouts.main')

@section('title', 'Editar seu cadastro')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>Editar seu cadastro </h1>
  <form action="/projetos/update/{{$Projeto->id}}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
      <label for="title">Nome:</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Nome do orientador" value= "{{$Projeto->name}}">
    </div>
    <div class="form-group">
      <label for="title">Campus</label>
      <input type="text" class="form-control" id="campus" name="campus" placeholder="Seu campus" value= "{{$Projeto->campus}}">
    </div>
    <div class="form-group">
      <label for="title">Descreva suas habilidades:</label>
      <textarea name="description" id="description" class="form-control" placeholder="Suas habilidades"> {{$Projeto->description}} </textarea>
    </div>
    <div class="form-group">
      <label for="title">Tags:</label>
        <select class="selectpicker col-12" multiple data-live-search="true" title="Selecione as TAGS" name="tag[]">
          @foreach($Tag as $Tag)
            <option value="{{$Tag->id}}">{{$Tag->name}}</option>
          @endforeach
      </select>
    </div>
    <input type="submit" class="btn btn-primary" value="Editar Projeto">
  </form>
</div>

@endsection
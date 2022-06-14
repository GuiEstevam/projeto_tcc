<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

@extends('layouts.main')

@section('title', 'Cadastre seu projeto')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>Cadastre seu projeto </h1>
  <form action="/projetos" method="POST" enctype="multipart/form-data">
   @csrf
   <div class="form-group">
      <label for="image">Imagem referente ao projeto:</label>
      <input type="file" id="image" name="image" class="form-control-file">
    </div>
    <div class="form-group">
      <label for="title">Nome do projeto:</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Nome do projeto">
    </div>
    <div class="form-group">
      <label for="title">Campus onde será realizado:</label>
      <input type="text" class="form-control" id="campus" name="campus" placeholder="Campus onde será realizado">
    </div>
    <div class="form-group">
      <label for="title">Descreva a respeito do seu projeto:</label>
      <textarea name="description" id="description" class="form-control" placeholder="Comente a respeito do seu projeto"></textarea>
    </div>
    <div class="form-group">
      <label for="title">Tags:</label>
        <select class="selectpicker col-12" multiple data-live-search="true" title="Selecione as TAGS" name="tag[]">
          @foreach($Tag as $Tag)
            <option value="{{$Tag->id}}">{{$Tag->name}}</option>
          @endforeach
      </select>
    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-primary" value="Criar Projeto">
    </div>
  </form>
</div>

@endsection
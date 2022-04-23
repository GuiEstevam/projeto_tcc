
@extends('layouts.main')

@section('title', 'Cadastre seu projeto')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>Cadastre seu projeto </h1>
  <form action="/projetos" method="POST" enctype="multipart/form-data">
   @csrf
   <div class="form-group">
      <label for="image">Imagem do referente ao projeto:</label>
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
      <label for="title">Está disponível para orientação?</label>
      <select name="disponibility" id="disponibility" class="form-control">
        <option value="0">Não</option>
        <option value="1">Sim</option>
      </select>
    </div>
    <div class="form-group">
      <label for="title">Descreva a respeito do seu projeto:</label>
      <textarea name="description" id="description" class="form-control" placeholder="Comente a respeito do seu projeto"></textarea>
    </div>
    <input type="submit" class="btn btn-primary" value="Criar Projeto">
  </form>
</div>

@endsection
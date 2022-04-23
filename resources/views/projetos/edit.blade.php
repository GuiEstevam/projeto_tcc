
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
      <label for="title">Está disponível para orientação?</label>
      <select name="disponibility" id="disponibility" class="form-control">
        <option value="0">Não</option>
        <option value="1" {{$Projeto->disponibility == 1 ? "selected='selected'" : "" }}>Sim</option>
      </select>
    </div>
    <div class="form-group">
      <label for="title">Descreva suas habilidades:</label>
      <textarea name="description" id="description" class="form-control" placeholder="Suas habilidades"> {{$Projeto->description}} </textarea>
    </div>
    <input type="submit" class="btn btn-primary" value="Editar Projeto">
  </form>
</div>

@endsection

@extends('layouts.main')

@section('title', 'Crie uma nova tag')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>Cadastre seu projeto </h1>
  <form action="/tags" method="POST" enctype="multipart/form-data">
   @csrf
    <div class="form-group">
      <label for="title">Nome da TAG:</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Nome da TAG">
    </div>
    <div class="form-group">
      <label for="title">Ela está disponível?</label>
      <select name="disponibility" id="disponibility" class="form-control">
        <option value="1">Sim</option>
        <option value="0">Não</option>
      </select>
    </div>
    <input type="submit" class="btn btn-primary" value="CRIAR TAG">
  </form>
</div>

@endsection
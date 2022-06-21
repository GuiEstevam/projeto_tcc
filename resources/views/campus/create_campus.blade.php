
@extends('layouts.main')

@section('title', 'Crie um novo Campus')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>Cadastre o Campus </h1>
  <form action="/campus" method="POST" enctype="multipart/form-data">
   @csrf
    <div class="form-group">
      <label for="title">Nome do Campus:</label>
      <input type="text" class="form-control" id="name" name="name" placeholder="Nome do Campus">
    </div>
    <div class="form-group">
      <label for="title">Ele está disponível?</label>
      <select name="disponibility" id="disponibility" class="form-control">
        <option value="1">Sim</option>
        <option value="0">Não</option>
      </select>
    </div>
    <input type="submit" class="btn btn-primary" value="CRIAR CAMPUS">
  </form>
</div>

@endsection
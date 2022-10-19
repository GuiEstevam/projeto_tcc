@extends('layouts.main')

@section('title', 'Complete seu perfil!')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h1>Finalize seu perfil! </h1>
  <form action="/projetos" method="POST" enctype="multipart/form-data">
   @csrf
   <div class="form-group">
      <label for="image">Coloque uma imagem de perfil:</label>
      <input type="file" id="image" name="image" class="form-control-file">
    </div>
    @if($User->role_id == 2)
    <div class="form-group">    
        <label for="title">Em qual semestre você está?</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Insira o semestre aqui">
    </div>
    @endif
    <div class="form-group">
      <label for="title">Informe seu campus:</label>
      <select class="form-control" id="campus" name="campus" placeholder="Campus onde será realizado">
        <option value =""></option>
        @foreach ($Campus as $Campus)
          <option value = "{{$Campus->id}}">{{$Campus->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group">
      <label for="title">Descreva um pouco sobre você:</label>
      <textarea name="description" id="description" class="form-control" placeholder="Insira uma descrição sobre você"></textarea>
    </div>
    <div class="form-group">
      <label for="title">Selecione as tags que melhor te representam:</label>
        <select class="selectpicker col-12" multiple data-live-search="true" title="TAGS" name="tags[]">
          @foreach($Tag as $Tag)
            <option value="{{$Tag->id}}">{{$Tag->name}}</option>
          @endforeach
      </select>
    </div>
    <div class="form-group">
        <label for="title"> Gostaria que seu e-mail ficasse disponivel no perfil?</label><br> 
        <input type="checkbox" title="Sim" name="show_email">
        <label for="title"> Sim</label> 
        <input type="checkbox" name="show_email">
        <label for="title"> Não</label> 

    </div>
    <div class="form-group">
      <input type="submit" class="btn btn-primary" value="Finalizar perfil">
    </div>
  </form>
</div>

@endsection
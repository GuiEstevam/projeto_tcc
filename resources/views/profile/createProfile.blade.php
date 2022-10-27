@extends('layouts.main')

@section('title', 'Complete seu perfil!')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
  <h4>Finalize seu perfil! </h4>
  <form action="/profile" method="POST" enctype="multipart/form-data">
   @csrf
    <div class="form-group col-12">
      <label for="image" style="Roboto">Coloque uma imagem de perfil:</label>
      <input type="file" id="image" name="image" class="form-control">
    </div>
    <div class="img-holder">
    </div>
    @if($User->role_id == 2)
    <div class="form-group col-12">    
      <label for="title">Qual curso você está realizando no momento?</label>
      <input type="text" class="form-control" id="graduation" name="graduation" placeholder="Insira o nome do curso aqui">
    </div>
    <div class="form-group col-12">    
        <label for="title">Em qual semestre você está?</label>
        <input type="text" class="form-control" id="semester" name="semester" placeholder="Insira o semestre aqui">
    </div>
    @elseif($User->role_id == 3)
    <div class="form-group col-12">    
      <label for="title">Você é responsável por qual disciplina?</label>
      <input type="text" class="form-control" id="graduation" name="graduation" placeholder="Insira o nome do curso aqui">
    </div>
    @endif
    <div class="form-group col-12">
      <label for="title">Informe seu campus:</label>
      <select class="form-control" id="campus" name="campus" placeholder="Selecione seu campus aqui">
        <option value =""></option>
        @foreach ($Campus as $Campus)
          <option value = "{{$Campus->name}}">{{$Campus->name}}</option>
        @endforeach
      </select>
    </div>
    <div class="form-group col-12">
      <label for="title">Descreva um pouco sobre você:</label>
      <textarea name="description" id="description" class="form-control" placeholder="Insira uma descrição sobre você"></textarea>
    </div>
    <!-- Botão para acionar modal -->
    <div class="col-12  text-right">
      <a href="#" data-toggle="modal" data-target="#modalExperience">
        <ion-icon name="add-outline"></ion-icon>
      </a>
    </div>
      <div class="form-group col-12">
        <label for="title">Outras formações acadêmicas:</label>
          <div class="form-group col-12 mt-3">
            @foreach ($Experiences as $Experience)
              <div class="experienceControl col-12 text-right">
                <a href="#" data-toggle="modal" data-target="#modalExperience{{$Experience->id}}"><ion-icon name="pencil-sharp"></ion-icon></a> 
                <a href="/profile/delete/{{$Experience->id}}" method ="POST">
                  @csrf
                  <ion-icon name="trash-outline"></ion-icon>
                </a>
              </div>
                Curso: {{$Experience->experienceName}}<br>
                Instituição: {{ $Experience->institutionName }}<br>
                Data de inicio: {{ date('d/m/Y', strtotime($Experience->firstDate)) }}<br>
                Data fim: {{ date('d/m/Y', strtotime($Experience->lastDate))}}<br>
                <hr>
            @endforeach
          </div>
      </div>
    <div class="form-group col-12">
      <label for="title">Selecione as tags que melhor te representam:</label>
        <select class="form-control col-12" multiple data-live-search="true" title="TAGS" name="tags[]">
          @foreach($Tag as $Tag)
            <option value="{{$Tag->id}}">{{$Tag->name}}</option>
          @endforeach
      </select>
    </div>
    <div class="form-group col-12 text-right">
      <input type="submit" class="btn btn-primary" value="Finalizar perfil">
    </div>
  </form>
</div>
      <!-- Modal de nova experiência -->
<div class="modal fade" id="modalExperience" tabindex="-1" role="dialog" aria-labelledby="modalExperience" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ExperienceModalLabel">Adicionar nova formação</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form form action="/profile/createExperience" method="POST" enctype="multipart/form-data">
          @csrf 
          <div class="form-group col-12">
            <label for="title">Nome do curso</label>
            <input type="text" class="form-control" id="experienceNameId" name="experienceName" placeholder="Insira o nome do curso aqui">
          </div>
          <div class="form-group col-12">
            <label for="title">Instituição de Ensino</label>
            <input type="text" class="form-control" id="experienceInstitutionId" name="experienceInstitution" placeholder="Insira o nome da instituição aqui">
          </div>
          <div class="row">
              <div class="form-group col-6">
                <label for="title">Data de ínicio</label>
                <input type="date" class="form-control" id="experienceFirstDateId" name="experienceFirstDate">
            </div>
              <div class="form-group col-6">
                <label for="title">Data fim</label>
                <input type="date" class="form-control" id="experienceLastDateId" name="experienceLastDate">
              </div>
          </div>
        </div>              
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="submit" class="btn btn-primary">Salvar mudanças</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endsection
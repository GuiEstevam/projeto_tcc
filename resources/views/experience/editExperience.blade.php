<div class="modal fade" id="modalExperience{{$Experience->id}}" tabindex="-1" role="dialog" aria-labelledby="modalExperience" aria-hidden="true">
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
              <input type="text" class="form-control" id="experienceNameId" name="experienceName" value="{{$Experience->experienceName}}">
            </div>
            <div class="form-group col-12">
              <label for="title">Instituição de Ensino</label>
              <input type="text" class="form-control" id="experienceInstitutionId" name="experienceInstitution" value="{{$Experience->institutionName}}">
            </div>
            <div class="row">
                <div class="form-group col-6">
                  <label for="title">Data de ínicio</label>
                  <input type="date" class="form-control" id="experienceFirstDateId" name="experienceFirstDate" value="{{$Experience->firstDate}}">
              </div>
                <div class="form-group col-6">
                  <label for="title">Data fim</label>
                  <input type="date" class="form-control" id="experienceLastDateId" name="experienceLastDate" value="{{$Experience->lastDate}}">
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
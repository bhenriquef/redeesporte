<div class="modal fade" id="modal-editar_evento" tabindex="-1" aria-labelledby="modal-editar_evento-title" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-editar_evento-title">Editar Evento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form-editar_evento">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <input type="hidden" name="id" id="modal-editar_evento-id" value="">
          <div class="row">  
            <div class="col-md-4">
              <label for="modal-editar_evento-titulo" class="form-label">Titulo</label>
              <input type="text" name="titulo" class="form-control" id="modal-editar_evento-titulo" placeholder="">
            </div>
            <div class="col-md-4">
              <label for="modal-editar_evento-codigo_projeto" class="form-label">Codigo do Projeto</label>
              <input type="text" name="codigo_projeto" class="form-control" id="modal-editar_evento-codigo_projeto" placeholder="">
            </div>
            <div class="col-md-3">
              <label for="modal-editar_evento-valor_evento" class="form-label">Valor Previsto</label>
              <input type="text" name="valor_evento" class="form-control" id="modal-editar_evento-valor_evento" placeholder="">
            </div>
            <div class="col-md-3">
              <label for="modal-editar_evento-data_evento" class="form-label">Data do Evento</label>
              <input type="text" name="data_evento" class="form-control" id="modal-editar_evento-data_evento" placeholder="">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Fechar</button>
        <button type="button" class="btn btn-outline-success" onclick="editarEvento();"><i class="fas fa-save"></i> Editar</button>
      </div>
    </div>
  </div>
</div>
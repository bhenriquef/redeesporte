<div class="modal fade" id="modal-apagar_evento" tabindex="-1" aria-labelledby="modal-apagar_evento-title" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-apagar_evento-title">Deletar Evento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form-apagar_evento">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="id" id="modal-apagar_evento-id">
            <h5>Deseja apagar esse evento?</h5>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Não</button>
        <button type="button" onclick="apagarEvento();" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Sim</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal-apagar_despesas" tabindex="-1" aria-labelledby="modal-apagar_despesas-title" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-apagar_despesas-title">Deletar Despesa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form-apagar_despesas">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="id" id="modal-apagar_despesas-id">
            <input type="hidden" name="id" id="modal-apagar_despesas-evento_id">
            <h5>Deseja apagar essa despesa?</h5>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Não</button>
        <button type="button" onclick="apagarDespesa();" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Sim</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal-nova_despesa" tabindex="-1" aria-labelledby="modal-nova_despesa-title" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-nova_despesa-title">Cadastrar Despesa</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form-nova_despesa">
          <input type="hidden" name="_token" value="{{csrf_token()}}">
          <input type="hidden" name="evento_id" id="modal-nova_despesa-evento_id" value="">
          <div class="row">  
            <div class="col-md-4">
              <label for="modal-nova_despesa-titulo" class="form-label">Titulo</label>
              <input type="text" name="titulo" class="form-control" id="modal-nova_despesa-titulo" placeholder="">
            </div>
            <div class="col-md-4">
              <label for="modal-nova_despesa-quantidade" class="form-label">Quantidade</label>
              <input type="text" name="quantidade" class="form-control" id="modal-nova_despesa-quantidade" placeholder="">
            </div>
            <div class="col-md-3">
              <label for="modal-nova_despesa-valor_unitario" class="form-label">Valor Unitario</label>
              <input type="text" name="valor_unitario" class="form-control" id="modal-nova_despesa-valor_unitario" placeholder="">
            </div>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Fechar</button>
        <button type="button" class="btn btn-outline-success" onclick="novaDespesa();"><i class="fas fa-plus"></i> Cadastrar</button>
      </div>
    </div>
  </div>
</div>
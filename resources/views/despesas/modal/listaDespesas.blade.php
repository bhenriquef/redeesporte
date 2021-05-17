<div class="modal fade" id="modal-list_despesas" tabindex="-1" aria-labelledby="modal-list_despesas-title" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal-list_despesas-title">Listar Despesas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="form-list_despesas">
            <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
            <table id="table-despesas" class="table">
                <thead>
                    <tr>
                        <th style="width: 5%" scope="col">ID</th>
                        <th style="width: 20%" scope="col">Titulo</th>
                        <th style="width: 10%" scope="col">Quantidade</th>
                        <th style="width: 20%" scope="col">Valor Unitario</th>
                        <th style="width: 20%" scope="col">Valor Total</th>
                        <th style="width: 25%" scope="col">#</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal"><i class="fas fa-times"></i> Fechar</button>
      </div>
    </div>
  </div>
</div>
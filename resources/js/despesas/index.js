

window.modalNovaDespesa = function($id){
    $("#modal-nova_despesa").modal('show');
    $("#modal-nova_despesa-valor_unitario").mask("#.###.###.###.###,00", {reverse: true});

    $("#modal-nova_despesa-valor_unitario").val("").change();
    $("#modal-nova_despesa-quantidade").val("").change();
    $("#modal-nova_despesa-evento_id").val($id).change();
    $("#modal-nova_despesa-titulo").val("").change();
}

window.novaDespesa = function(){
    var result = requestAjax('POST', 'dashboard/novaDespesa', $("#form-nova_despesa").serialize());
    
    if(result.status){
        $("#modal-nova_despesa").modal('hide');
        listaDespesas();
    }
}

window.modalListDespesas = function(id){
    $("#modal-list_despesas").modal('show');
    listDespesas(id);
}

function listDespesas(id){
    var result = requestAjax('GET', 'dashboard/listarDespesas/'+id);
    var html = "";
    if(result.status){
        var data = result.responseJSON;

        $.each(data, function(index, value){
            html += '<tr>'
                        +'<td scope="row">'+value['id']+'</td>'
                        +'<td>'
                            +'<span class="text-despesas-'+value['id']+'">'+value['titulo']+'</span>'
                            +'<input style="display: none;" class="form-control list-despesas-'+value['id']+'" value="'+value['titulo']+'" name="titulo">'
                        +'</td>'
                        +'<td>'
                            +'<span class="text-despesas-'+value['id']+'">'+value['quantidade']+'</span>'
                            +'<input style="display: none;" class="form-control list-despesas-'+value['id']+'" value="'+value['quantidade']+'" name="quantidade">'
                        +'</td>'
                        +'<td>'
                            +'<span class="text-despesas-'+value['id']+'">'+value['valor_unitario']+'</span>'
                            +'<input style="display: none;" class="form-control moeney list-despesas-'+value['id']+'" value="'+value['valor_unitario']+'" name="valor_unitario">'
                        +'</td>'
                        +'<td>'+value['valor_total']+'</td>'
                        +'<td>'
                            +'<button type="button" id="btn-list_despesas-editar-'+value['id']+'" onclick="editarDespesa('+value['id']+')" class="btn btn-link tooltips" data-placement="top" title="Editar Despesa"><i class="fas fa-edit"></i></button>'
                            +'<button type="button" id="btn-list_despesas-salvar-'+value['id']+'" onclick="atualizarDespesa('+value['id']+', '+value['evento_id']+');" class="btn btn-link text-success tooltips" style="display: none;" data-placement="top" title="Salvar Despesa"><i class="fas fa-save"></i></button>'
                            +'<button type="button" onclick="modalApagarDespesa('+value['id']+', '+value['evento_id']+')" class="btn btn-link text-danger tooltips" data-placement="top" title="Apagar Despesa"><i class="fas fa-trash"></i></button>'
                        +'</td>'
                    +'</tr>';
        });
    }

    $("#table-despesas tbody").html(html);
    $(".moeney").mask("#.###.###.###.###,00", {reverse: true});
}

window.editarDespesa = function(id){
    $(".text-despesas-"+id).hide();
    $("#btn-list_despesas-editar-"+id).hide();
    $("#btn-list_despesas-salvar-"+id).show();
    $(".list-despesas-"+id).show();
}

window.atualizarDespesa = function(id, evento){
    var result = requestAjax('PUT', 'dashboard/atualizarDespesa/'+id, $(".list-despesas-"+id).serialize()+'&_token='+$("#_token").val());
    
    if(result.status){
        setTimeout(function(){
            listDespesas(evento);
        }, 500)
    }
}

window.modalApagarDespesa = function(id, evento){
    $("#modal-apagar_despesas").modal('show');
    $("#modal-apagar_despesas-id").val(id);
    $("#modal-apagar_despesas-evento_id").val(evento);
}

window.apagarDespesa = function(){
    var id = $("#modal-apagar_despesas-id").val();
    var evento = $("#modal-apagar_despesas-evento_id").val();
    var result = requestAjax('DELETE', 'dashboard/deletarDespesa/'+id, $("#form-apagar_despesas").serialize());
    
    if(result.status){
        $("#modal-apagar_despesas").modal('hide');
        setTimeout(function(){
            listDespesas(evento);
        }, 500)
    }
}
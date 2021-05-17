$(function(){
    listEvents();
});


function listEvents(){
    var result = requestAjax('GET', 'dashboard/listarEventos');
    var html = "";
    if(result.status){
        var data = result.responseJSON;

        $.each(data, function(index, value){
            html += '<tr>'
                        +'<td scope="row">'+value['id']+'</td>'
                        +'<td>'+value['titulo']+'</td>'
                        +'<td>'+value['codigo_projeto']+'</td>'
                        +'<td>'+value['nome_usuario']+'</td>'
                        +'<td>'+value['data_evento']+'</td>'
                        +'<td>R$ '+value['valor_evento']+'</td>'
                        +'<td>'
                            +'<button type="button" class="btn btn-link tooltips" data-placement="top" onclick="modalEditarEvento('+value['id']+');" title="Editar Evento"><i class="fas fa-edit"></i></button>'
                            +'<button type="button" class="btn btn-link text-success tooltips" data-placement="top" onclick="modalNovaDespesa('+value['id']+');" title="Adicionar despesas"><i class="fas fa-hand-holding-usd"></i></button>'
                            +'<button type="button" class="btn btn-link tooltips" data-placement="top" onclick="modalListDespesas('+value['id']+');" title="Ver despesas"><i class="fas fa-file-invoice-dollar"></i></button>'
                            +'<button type="button" class="btn btn-link text-danger tooltips" data-placement="top" onclick="modalApagarEvento('+value['id']+')" title="Apagar Evento"><i class="fas fa-trash"></i></button>'
                        +'</td>'
                    +'</tr>';
        });
    }

    $("#table-eventos tbody").html(html);
}

window.modalNovoEvento = function(){
    $("#modal-novo_evento").modal('show');
    $("#modal-novo_evento-data_evento").mask('00/00/0000');
    $("#modal-novo_evento-valor_evento").mask("#.###.###.###.###,00", {reverse: true});
    $("#modal-novo_evento-codigo_projeto").mask('000-000-0');

    $("#modal-novo_evento-data_evento").val("").change();
    $("#modal-novo_evento-valor_evento").val("").change();
    $("#modal-novo_evento-codigo_projeto").val("").change();
    $("#modal-novo_evento-titulo").val("").change();
}

window.novoEvento = function(){
    var result = requestAjax('POST', 'dashboard/novoEvento', $("#form-novo_evento").serialize());

    if(result.status){
        $("#modal-novo_evento").modal('hide');
        listEvents();
    }
}

window.modalApagarEvento = function(id){
    $("#modal-apagar_evento").modal('show');
    $("#modal-apagar_evento-id").val(id);
}

window.apagarEvento = function(){
    var id = $("#modal-apagar_evento-id").val();
    var result = requestAjax('DELETE', 'dashboard/deletarEvento/'+id, $("#form-apagar_evento").serialize());
    
    if(result.status){
        $("#modal-apagar_evento").modal('hide');
        listEvents();
    }
}

window.modalEditarEvento = function(id){
    var result = requestAjax('GET', 'dashboard/pegarEvento/'+id);
    
    if(result.status){
        var data = result.responseJSON;

        $("#modal-editar_evento").modal('show');
        $("#modal-editar_evento-data_evento").mask('00/00/0000');
        $("#modal-editar_evento-valor_evento").mask("#.###.###.###.###,00", {reverse: true});
        $("#modal-editar_evento-codigo_projeto").mask('000-000-0');
    
        $("#modal-editar_evento-id").val(data['id']).change();
        $("#modal-editar_evento-data_evento").val(data['data_evento']).change();
        $("#modal-editar_evento-valor_evento").val(data['valor_evento']).change();
        $("#modal-editar_evento-codigo_projeto").val(data['codigo_projeto']).change();
        $("#modal-editar_evento-titulo").val(data['titulo']).change();
    }
}

window.editarEvento = function(){
    var id = $("#modal-editar_evento-id").val();
    var result = requestAjax('PUT', 'dashboard/editarEvento/'+id, $("#form-editar_evento").serialize());
    
    if(result.status){
        $("#modal-editar_evento").modal('hide');
        listEvents();
    }
}
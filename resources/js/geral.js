// js para armazenar todas as funções globais

const { data } = require("jquery");

window.requestAjax = function(method, url, data = [], async = false){
    
    var result = $.ajax({
        method: method,
        url: url,
        dataType: "json",
        data: data,
        async: async,
        context: document.body
    }).done(function(data) {
        return data.responseJSON;
    }).fail(function(data){
        return data.responseJSON;
    });

    return result;
}
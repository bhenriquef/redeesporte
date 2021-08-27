/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/eventos/index.js":
/*!***************************************!*\
  !*** ./resources/js/eventos/index.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function () {
  listEvents();
});

function listEvents() {
  var result = requestAjax("GET", "dashboard/listarEventos");
  var html = "";

  if (result.status) {
    var data = result.responseJSON;
    $.each(data, function (index, value) {
      html += "<tr>" + '<td scope="row">' + value["id"] + "</td>" + "<td>" + value["titulo"] + "</td>" + "<td>" + value["codigo_projeto"] + "</td>" + "<td>" + value["nome_usuario"] + "</td>" + "<td>" + value["data_evento"] + "</td>" + "<td>R$ " + value["valor_evento"] + "</td>" + "<td>" + '<button type="button" class="btn btn-link text-white tooltips" data-placement="top" onclick="modalEditarEvento(' + value["id"] + ');" title="Editar Evento"><i class="fas fa-edit"></i></button>' + '<button type="button" class="btn btn-link text-white tooltips" data-placement="top" onclick="modalListDespesas(' + value["id"] + ');" title="Ver despesas"><i class="fas fa-file-invoice-dollar"></i></button>' + '<button type="button" class="btn btn-link text-white tooltips" data-placement="top" onclick="modalNovaDespesa(' + value["id"] + ');" title="Adicionar despesas"><i class="fas fa-hand-holding-usd"></i></button>' + '<button type="button" class="btn btn-link text-danger tooltips" data-placement="top" onclick="modalApagarEvento(' + value["id"] + ')" title="Apagar Evento"><i class="fas fa-trash"></i></button>' + "</td>" + "</tr>";
    });
  }

  $("#table-eventos tbody").html(html);
}

window.modalNovoEvento = function () {
  $("#modal-novo_evento").modal("show");
  $("#modal-novo_evento-data_evento").mask("00/00/0000");
  $("#modal-novo_evento-valor_evento").mask("#.###.###.###.###,00", {
    reverse: true
  });
  $("#modal-novo_evento-codigo_projeto").mask("000-000-0");
  $("#modal-novo_evento-data_evento").val("").change();
  $("#modal-novo_evento-valor_evento").val("").change();
  $("#modal-novo_evento-codigo_projeto").val("").change();
  $("#modal-novo_evento-titulo").val("").change();
};

window.novoEvento = function () {
  var result = requestAjax("POST", "dashboard/novoEvento", $("#form-novo_evento").serialize());

  if (result.status) {
    $("#modal-novo_evento").modal("hide");
    listEvents();
  }
};

window.modalApagarEvento = function (id) {
  $("#modal-apagar_evento").modal("show");
  $("#modal-apagar_evento-id").val(id);
};

window.apagarEvento = function () {
  var id = $("#modal-apagar_evento-id").val();
  var result = requestAjax("DELETE", "dashboard/deletarEvento/" + id, $("#form-apagar_evento").serialize());

  if (result.status) {
    $("#modal-apagar_evento").modal("hide");
    listEvents();
  }
};

window.modalEditarEvento = function (id) {
  var result = requestAjax("GET", "dashboard/pegarEvento/" + id);

  if (result.status) {
    var data = result.responseJSON;
    $("#modal-editar_evento").modal("show");
    $("#modal-editar_evento-data_evento").mask("00/00/0000");
    $("#modal-editar_evento-valor_evento").mask("#.###.###.###.###,00", {
      reverse: true
    });
    $("#modal-editar_evento-codigo_projeto").mask("000-000-0");
    $("#modal-editar_evento-id").val(data["id"]).change();
    $("#modal-editar_evento-data_evento").val(data["data_evento"]).change();
    $("#modal-editar_evento-valor_evento").val(data["valor_evento"]).change();
    $("#modal-editar_evento-codigo_projeto").val(data["codigo_projeto"]).change();
    $("#modal-editar_evento-titulo").val(data["titulo"]).change();
  }
};

window.editarEvento = function () {
  var id = $("#modal-editar_evento-id").val();
  var result = requestAjax("PUT", "dashboard/editarEvento/" + id, $("#form-editar_evento").serialize());

  if (result.status) {
    $("#modal-editar_evento").modal("hide");
    listEvents();
  }
};

/***/ }),

/***/ 1:
/*!*********************************************!*\
  !*** multi ./resources/js/eventos/index.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\wamp64\www\rede_esporte\resources\js\eventos\index.js */"./resources/js/eventos/index.js");


/***/ })

/******/ });
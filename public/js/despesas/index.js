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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/despesas/index.js":
/*!****************************************!*\
  !*** ./resources/js/despesas/index.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports) {

window.modalNovaDespesa = function ($id) {
  $("#modal-nova_despesa").modal('show');
  $("#modal-nova_despesa-valor_unitario").mask("#.###.###.###.###,00", {
    reverse: true
  });
  $("#modal-nova_despesa-valor_unitario").val("").change();
  $("#modal-nova_despesa-quantidade").val("").change();
  $("#modal-nova_despesa-evento_id").val($id).change();
  $("#modal-nova_despesa-titulo").val("").change();
};

window.novaDespesa = function () {
  var result = requestAjax('POST', 'dashboard/novaDespesa', $("#form-nova_despesa").serialize());

  if (result.status) {
    $("#modal-nova_despesa").modal('hide');
    listaDespesas();
  }
};

window.modalListDespesas = function (id) {
  $("#modal-list_despesas").modal('show');
  listDespesas(id);
};

function listDespesas(id) {
  var result = requestAjax('GET', 'dashboard/listarDespesas/' + id);
  var html = "";

  if (result.status) {
    var data = result.responseJSON;
    $.each(data, function (index, value) {
      html += '<tr>' + '<td scope="row">' + value['id'] + '</td>' + '<td>' + '<span class="text-despesas-' + value['id'] + '">' + value['titulo'] + '</span>' + '<input style="display: none;" class="form-control list-despesas-' + value['id'] + '" value="' + value['titulo'] + '" name="titulo">' + '</td>' + '<td>' + '<span class="text-despesas-' + value['id'] + '">' + value['quantidade'] + '</span>' + '<input style="display: none;" class="form-control list-despesas-' + value['id'] + '" value="' + value['quantidade'] + '" name="quantidade">' + '</td>' + '<td>' + '<span class="text-despesas-' + value['id'] + '">' + value['valor_unitario'] + '</span>' + '<input style="display: none;" class="form-control moeney list-despesas-' + value['id'] + '" value="' + value['valor_unitario'] + '" name="valor_unitario">' + '</td>' + '<td>' + value['valor_total'] + '</td>' + '<td>' + '<button type="button" id="btn-list_despesas-editar-' + value['id'] + '" onclick="editarDespesa(' + value['id'] + ')" class="btn btn-link tooltips" data-placement="top" title="Editar Despesa"><i class="fas fa-edit"></i></button>' + '<button type="button" id="btn-list_despesas-salvar-' + value['id'] + '" onclick="atualizarDespesa(' + value['id'] + ', ' + value['evento_id'] + ');" class="btn btn-link text-success tooltips" style="display: none;" data-placement="top" title="Salvar Despesa"><i class="fas fa-save"></i></button>' + '<button type="button" onclick="modalApagarDespesa(' + value['id'] + ', ' + value['evento_id'] + ')" class="btn btn-link text-danger tooltips" data-placement="top" title="Apagar Despesa"><i class="fas fa-trash"></i></button>' + '</td>' + '</tr>';
    });
  }

  $("#table-despesas tbody").html(html);
  $(".moeney").mask("#.###.###.###.###,00", {
    reverse: true
  });
}

window.editarDespesa = function (id) {
  $(".text-despesas-" + id).hide();
  $("#btn-list_despesas-editar-" + id).hide();
  $("#btn-list_despesas-salvar-" + id).show();
  $(".list-despesas-" + id).show();
};

window.atualizarDespesa = function (id, evento) {
  var result = requestAjax('PUT', 'dashboard/atualizarDespesa/' + id, $(".list-despesas-" + id).serialize() + '&_token=' + $("#_token").val());

  if (result.status) {
    setTimeout(function () {
      listDespesas(evento);
    }, 500);
  }
};

window.modalApagarDespesa = function (id, evento) {
  $("#modal-apagar_despesas").modal('show');
  $("#modal-apagar_despesas-id").val(id);
  $("#modal-apagar_despesas-evento_id").val(evento);
};

window.apagarDespesa = function () {
  var id = $("#modal-apagar_despesas-id").val();
  var evento = $("#modal-apagar_despesas-evento_id").val();
  var result = requestAjax('DELETE', 'dashboard/deletarDespesa/' + id, $("#form-apagar_despesas").serialize());

  if (result.status) {
    $("#modal-apagar_despesas").modal('hide');
    setTimeout(function () {
      listDespesas(evento);
    }, 500);
  }
};

/***/ }),

/***/ 3:
/*!**********************************************!*\
  !*** multi ./resources/js/despesas/index.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\wamp64\www\rede_esporte\resources\js\despesas\index.js */"./resources/js/despesas/index.js");


/***/ })

/******/ });
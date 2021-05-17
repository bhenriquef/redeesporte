<?php

namespace App\Http\Controllers;

use App\Model\Despesa;
use App\Model\Evento;
use Illuminate\Http\Request;

class DespesaController extends Controller
{
    public function __construct(Despesa $model){
        $this->model = $model;
    }

    public function listarDespesas($evento_id){
        return $this->model->listarDespesas($evento_id);
    }

    public function novaDespesa(Request $request){
        $Event = Evento::find($request->input('evento_id'));

        $this->model->titulo = $request->input('titulo');
        $this->model->projeto_origem = $Event->codigo_projeto;
        $this->model->quantidade = $request->input('quantidade');
        $this->model->valor_unitario = str_replace(',', '.', str_replace('.', '', $request->input('valor_unitario')));
        $valor_total = floatval($request->input('valor_unitario')) * floatval($request->input('quantidade'));
        $this->model->valor_total = str_replace(',', '.', str_replace('.', '', $valor_total));
        $this->model->evento_id = $request->input('evento_id');
        $this->model->created_at = date('Y-m-d H:i:s');
        $this->model->updated_at = date('Y-m-d H:i:s');
        $this->model->save();

        return ['message' => 'cadastrado com sucesso', 'status' => 1];
    }

    public function pegarDespesa($id){
        return $this->model->pegarDespesa($id);
    }

    public function atualizarDespesa(Request $request, $id){
        $this->model = $this->model->find($id);

        $this->model->titulo = $request->input('titulo');
        $this->model->quantidade = $request->input('quantidade');
        $this->model->valor_unitario = str_replace(',', '.', str_replace('.', '', $request->input('valor_unitario')));
        $valor_total = floatval($request->input('valor_unitario')) * floatval($request->input('quantidade'));
        $this->model->valor_total = str_replace(',', '.', str_replace('.', '', $valor_total));
        $this->model->updated_at = date('Y-m-d H:i:s');
        $this->model->save();

        return ['message' => 'atualizado com sucesso', 'status' => 1];
    }

    public function deletarDespesa($id){
        $this->model = $this->model->find($id);

        $this->model->deleted_at = date('Y-m-d H:i:s');
        $this->model->save();
    }
}

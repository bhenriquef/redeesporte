<?php

namespace App\Http\Controllers;

use App\Model\Evento;
use App\Model\Despesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class EventoController extends Controller
{
    public function __construct(Evento $model)
    {
        $this->model = $model;
    }

    public function listarEventos()
    {
        return $this->model->listarEventos();
    }

    public function novoEvento(Request $request)
    {
        $this->model->titulo = $request->input('titulo');
        $this->model->codigo_projeto = $request->input('codigo_projeto');
        $this->model->id_usuario = Auth::user()->id;
        $this->model->valor_evento = str_replace(',', '.', str_replace('.', '', $request->input('valor_evento')));
        $date = str_replace('/', '-', $request->input('data_evento'));
        $this->model->data_evento = date('Y-m-d', strtotime($date));
        $this->model->created_at = date('Y-m-d H:i:s');
        $this->model->updated_at = date('Y-m-d H:i:s');
        $this->model->save();

        return ['message' => 'cadastrado com sucesso', 'status' => 1];
    }

    public function pegarEvento($id)
    {
        return $this->model->pegarEvento($id);
    }

    public function editarEvento(Request $request, $id)
    {
        $this->model = $this->model->find($id);

        $this->model->titulo = $request->input('titulo');
        $this->model->codigo_projeto = $request->input('codigo_projeto');
        $this->model->valor_evento = str_replace(',', '.', str_replace('.', '', $request->input('valor_evento')));
        $date = str_replace('/', '-', $request->input('data_evento'));
        $this->model->data_evento = date('Y-m-d', strtotime($date));
        $this->model->updated_at = date('Y-m-d H:i:s');
        $this->model->save();

        return ['message' => 'editado com sucesso', 'status' => 1];
    }

    public function deletarEvento($id)
    {
        $this->model = $this->model->find($id);

        DB::table('despesas')->where('evento_id', $id)->update([
            'deleted_at' => date('Y-m-d H:i:s')
        ]);

        $this->model->deleted_at = date('Y-m-d H:i:s');
        $this->model->save();

        return ['message' => 'deletado com sucesso', 'status' => 1];
    }
}

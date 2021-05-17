<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'eventos';

    protected $fillable = [
        'titulo', 'codigo_projeto', 'id_usuario', 'valor_evento', 'data_evento', 'created_at', 'updated_at', 'deleted_at'
    ];

    public function scopeListarEventos($query){
        return $query->selectRaw('eventos.id, titulo, codigo_projeto, usuarios.nome as nome_usuario, valor_evento, DATE_FORMAT(data_evento, "%d/%m/%Y") as data_evento')
                ->leftJoin('usuarios', 'id_usuario', '=', 'usuarios.id')
                ->orderBy('eventos.id', 'desc')
                ->whereNull('eventos.deleted_at')
                ->get()->toArray();
    }

    public function scopePegarEvento($query, $id){
        return $query->selectRaw('eventos.id, titulo, codigo_projeto, usuarios.nome as nome_usuario, valor_evento, DATE_FORMAT(data_evento, "%d/%m/%Y") as data_evento')
                ->leftJoin('usuarios', 'id_usuario', '=', 'usuarios.id')
                ->where('eventos.id', $id)
                ->whereNull('eventos.deleted_at')
                ->get()->first();
    }
}

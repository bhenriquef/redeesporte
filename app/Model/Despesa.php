<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    protected $table = 'despesas';

    protected $fillable = [
        'titulo', 'projeto_origem', 'quantidade', 'valor_unitario', 'evento_id', 'valor_total', 'created_at', 'updated_at', 'deleted_at'
    ];

    public function scopeListarDespesas($query, $evento_id){
        return $query->selectRaw('id, titulo, projeto_origem, quantidade, valor_unitario, evento_id, valor_total')
                ->where('evento_id', $evento_id)
                ->orderBy('id', 'desc')
                ->whereNull('deleted_at')
                ->get()->toArray();
    }

    public function scopePegarDespesa($query, $id){
        return $query->selectRaw('id, titulo, projeto_origem, quantidade, valor_unitario, evento_id, valor_total')
                ->where('id', $id)
                ->whereNull('deleted_at')
                ->get()->first();
    }
}

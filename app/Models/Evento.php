<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    public $timestamps = false;
    protected $fillable = ['nome','local', 'inicio', 'fim', 'data', 'responsavel', 'tipo_evento', 'vagas', 'publico_alvo'];
    //public $sortable = ['id', 'nome', 'local', 'inicio', 'fim', 'data', 'responsavel', 'tipo_evento', 'vagas', 'publico_alvo'];
}

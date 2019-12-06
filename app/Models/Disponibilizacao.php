<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disponibilizacao extends Model
{
    protected $table = 'disponibilizacoes';
    public $timestamps = false;
    protected $fillable = ['evento', 'turma'];
}

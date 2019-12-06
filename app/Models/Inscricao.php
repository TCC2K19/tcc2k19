<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inscricao extends Model
{
    protected $table = 'inscricoes';
    public $timestamps = false;
    protected $fillable = ['usuario','evento','usr_turma', 'evt_turma'];
}

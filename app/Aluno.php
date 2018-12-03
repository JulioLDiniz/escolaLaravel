<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = [
    	'nome','turma'
    ];

    public function turma(){
    	return $this->belongsTo('App\Turma');
    }
}

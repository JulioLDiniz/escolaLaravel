<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
	protected $fillable = [
		'titulo', 'turno'
	];

	public function salvaTurma(Turma $turma){
		if(!$turma->save()){
			throw new \Exception("Erro ao cadastrar turma.");
		}else{
			$turma->save();	
		}
	}
}

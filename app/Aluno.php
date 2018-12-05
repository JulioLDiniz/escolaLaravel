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

	public function verificaSeExiste($id){
		if(!$this->find($id)){
			throw new \Exception('Aluno não encontrado.');
		}else{
			return $this->find($id);
		}
	}
	public function verificaSeExisteTodos(){
		if(!$this->all()){
			throw new \Exception('Erro ao buscar alunos.');
		}else if($this->all()->isEmpty()){
			throw new \Exception('Nenhum aluno cadastrado.');
		}else{
			$alunos = $this->all();
			foreach ($alunos as $aluno) {
				$aluno->turma = $aluno->turma;
			}
			return $alunos;
		}
	}

	public function getAluno($id){
		$aluno = $this->verificaSeExiste($id);
		$aluno->turma = $aluno->turma;
		return $aluno;
	}

	public function salvaAluno(Aluno $aluno){
		if(!$this->save()){
			throw new \Exception("Erro ao cadastrar aluno.");
		}else{
			$this->save();
		}
	}

	public function excluiAluno($id){
		$aluno = $this->verificaSeExiste($id);
		if(!$aluno->delete()){
			throw new \Exception('Erro ao excluir aluno.');
		}else{
			$aluno->delete();
		}
	}

	public function alteraAluno($id, $params){
		$aluno = $this->verificaSeExiste($id);
		if(!$aluno->update($params)){
			throw new \Exception('Erro ao alterar aluno.');
		}else{
			$aluno->update($params);
		}
	}
}

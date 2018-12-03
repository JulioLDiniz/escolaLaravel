<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aluno;

class AlunoController extends Controller
{
	public function create(){
		try{
			$aluno = new Aluno();
			$aluno->nome = request()->nome;
			$aluno->turma_id = request()->turma_id;
			if(!$aluno->save()){
				throw new \Exception("Erro ao cadastrar aluno.");
			}
			$aluno->save();
			return response()->json(['message-success'=>'Aluno cadastrado com sucesso.']);
		}catch(\Exception $e){
			return response()->json(['message-error'=>$e->getMessage()]);
		}
	}

	public function listOne($id){
		try{
			if(!Aluno::find($id)){
				throw new \Exception('Aluno não encontrado.');
			}
			$aluno = Aluno::find($id);
			$aluno->turma = $aluno->turma;
			return response()->json($aluno);
		}catch(\Exception $e){
			return response()->json(['message-error'=>$e->getMessage()]);
		}
	}

	public function listAll(){
		try{
			if(!Aluno::all()){
				throw new \Exception('Erro ao buscar alunos.');
			}
			$alunos = Aluno::all();		
			return response()->json($alunos);
		}catch(\Exception $e){
			return response()->json(['message-error'=>$e->getMessage()]);
		}
	}
	public function delete($id){
		try{
			if(!Aluno::find($id)){
				throw new \Exception('Aluno não encontrado.');
			}
			$aluno = Aluno::find($id);
			if(!$aluno->delete()){
				throw new \Exception('Erro ao excluir aluno.');
			}
			return response()->json(['message-success'=>'Aluno excluído com sucesso.']);
		}catch(\Exception $e){
			return response()->json(['message-error'=>$e->getMessage()]);
		}
	}

	public function update($id){
		try{
			if(!Aluno::find($id)){
				throw new \Exception('Aluno não encontrado');
			}
			$aluno = Aluno::find($id);
			$aluno->nome = request()->nome;
			$aluno->turma_id = request()->turma_id;
			$aluno->update();
			return response()->json(['message-success'=>'Aluno alterado com sucesso.']);
		}catch(\Exception $e){
			return response()->json(['message-error'=>$e->getMessage()]);
		}
	}
}

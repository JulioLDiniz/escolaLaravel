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
			$aluno->salvaAluno($aluno);
			return response()->json(['message-success'=>'Aluno cadastrado com sucesso.']);
		}catch(\Exception $e){
			return response()->json(['message-error'=>$e->getMessage()]);
		}
	}

	public function listOne($id){
		try{
			$aluno = new Aluno();
			$aluno = $aluno->getAluno($id);
			return response()->json($aluno);
		}catch(\Exception $e){
			return response()->json(['message-error'=>$e->getMessage()]);
		}
	}

	public function listAll(){
		try{	
			$alunos = new Aluno();
			$alunos = $alunos->verificaSeExisteTodos();
			return response()->json($alunos);
		}catch(\Exception $e){
			return response()->json(['message-error'=>$e->getMessage()]);
		}
	}
	public function delete($id){
		try{
			 $aluno = new Aluno();
			 $aluno->excluiAluno($id);
			return response()->json(['message-success'=>'Aluno excluído com sucesso.']);
		}catch(\Exception $e){
			return response()->json(['message-error'=>$e->getMessage()]);
		}
	}

	public function update(Request $request, $id){
		try{
			 $aluno = new Aluno();
			 $aluno->alteraAluno($id, $request->all());
			return response()->json(['message-success'=>'Aluno alterado com sucesso.']);
		}catch(\Exception $e){
			return response()->json(['message-error'=>$e->getMessage()]);
		}
	}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Turma;

class TurmaController extends Controller
{
    public function create(){
    	try{
    		$turma = new Turma();
    		$turma->titulo = request()->titulo;
    		$turma->turno = request()->turno;
    		if(!$turma->save()){
    			throw new \Exception("Erro ao cadastrar turma.");
    		}
    		$turma->save();
    		return response()->json(['message-success'=>'Turma cadastrada com sucesso.']);
    	}catch(\Exception $e){
    		return response()->json(['message-error'=>$e->getMessage()]);
    	}
    }
}
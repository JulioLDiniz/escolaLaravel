<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
	//setando a tabela porque o Laravel coloca somenete um 's' por padrão no final da tabela e como esta termina com 'es', tive que especificar.
	protected $table = 'professores';
	
    protected $fillable = [
    	'nome', 'especialidade'
    ];
}

<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/cadastrar-aluno', 'AlunoController@create');
Route::post('/cadastrar-turma', 'TurmaController@create');
Route::get('/aluno/{id}', 'AlunoController@listOne');
Route::get('/alunos', 'AlunoController@listAll');
Route::delete('/excluir-aluno/{id}', 'AlunoController@delete');
Route::put('/alterar-aluno/{id}', 'AlunoController@update');
<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/api')->group(function () {
	Route::prefix('/v1')->group(function () {
		Route::get('/turnos', 'TurnoController@index');
		Route::get('/series', 'SerieController@index');
		Route::get('/turmas', 'TurmaController@index');
		Route::resource('professores', 'ProfessorController');
		Route::resource('atencoes', 'AtencaoController');
		Route::resource('situacoes', 'SituacaoController');

		Route::prefix('/aluno')->group(function() {
			Route::post('/busca', 'AlunoController@index');
			Route::post('/', 'AlunoController@store');
		});
		
		Route::post('/inscricao/busca', 'InscricaoController@index');
		Route::resource('inscricao', 'InscricaoController');

		Route::post('/candidato/busca', 'CandidatoController@index');
		Route::resource('candidato', 'CandidatoController');

		Route::prefix('/serievinculo')->group(function() {
			Route::get('/', 'SerieVinculoController@index');
			Route::post('/infos', 'SerieVinculoController@buscaInfos');
			Route::post('/series', 'SerieVinculoController@buscaSeries');
			Route::post('/turmas', 'SerieVinculoController@buscaTurmas');
			Route::post('/turnos', 'SerieVinculoController@buscaTurnos');
			Route::post('/', 'SerieVinculoController@store');
			Route::put('/{cod_serie_v}', 'SerieVinculoController@update');
		});

		Route::post('/seriedisciplina/busca', 'SerieDisciplinaController@index');
		Route::resource('seriedisciplina', 'SerieDisciplinaController');

		Route::prefix('/alunodisciplina')->group(function() {
			Route::post('/busca', 'AlunoDisciplinaController@index');
			Route::post('/', 'AlunoDisciplinaController@store');
		});

		Route::prefix('/professorvinculo')->group(function() {
			Route::get('/', 'ProfessorVinculoController@index');
			Route::post('/professores', 'ProfessorVinculoController@buscaProfessores');
		});
	});
});

Route::view('/', 'App');
Route::view('/{any}', 'App');
Route::view('/{any}/{sub}', 'App');
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
Route::get('/', function () {
    return view('welcome');
});
Route::post('/arquivoexcel', 'ImportaInscricaoController@importar');
*/
<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/api')->group(function () {
	Route::prefix('/v1')->group(function () {
		Route::get('/turnos', 'TurnoController@index')->name('turnos');
		Route::get('/series', 'SerieController@index')->name('series');
		Route::get('/turmas', 'TurmaController@index')->name('turmas');
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
			Route::get('/', 'SerieVinculoController@index')->name('serievinculo');
			Route::post('/series', 'SerieVinculoController@buscaSeries')->name('serievinculo.series');
			Route::post('/turmas', 'SerieVinculoController@buscaTurmas')->name('serievinculo.turmas');
			Route::post('/turnos', 'SerieVinculoController@buscaTurnos')->name('serievinculo.turnos');
		});

		Route::post('/seriedisciplina/busca', 'SerieDisciplinaController@index');
		Route::resource('seriedisciplina', 'SerieDisciplinaController');

		Route::prefix('/alunodisciplina')->group(function() {
			Route::post('/busca', 'AlunoDisciplinaController@index');
			Route::post('/', 'AlunoDisciplinaController@store');
		});

		Route::prefix('/professorvinculo')->group(function() {
			Route::get('/', 'ProfessorVinculoController@index')->name('professorvinculo');
			Route::post('/professores', 'ProfessorVinculoController@buscaProfessores')->name('professorvinculo.professores');
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
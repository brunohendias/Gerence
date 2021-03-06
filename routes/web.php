<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/api')->group(function () {
	Route::prefix('/v1')->group(function () {
		Route::prefix('/series')->group(function() {
			Route::get('/', 'SerieController@index');
			Route::post('/', 'SerieController@store');
		});
		Route::get('/turnos', 'TurnoController@index');
		Route::get('/turmas', 'TurmaController@index');
		Route::get('/professores', 'ProfessorController@index');
		Route::get('/atencoes', 'AtencaoController@index');
		Route::get('/situacoes', 'SituacaoController@index');
		Route::prefix('inscricao')->group(function () {
			Route::post('/busca', 'InscricaoController@index');
			Route::get('/{cod_insc}', 'InscricaoController@show');
		});
		Route::prefix('candidato')->group(function () {
			Route::post('/busca', 'CandidatoController@index');
			Route::post('/', 'CandidatoController@store');
		});
		Route::prefix('/aluno')->group(function() {
			Route::post('/busca', 'AlunoController@index');
			Route::post('/', 'AlunoController@store');
		});
		Route::prefix('/serievinculo')->group(function() {
			Route::post('/busca', 'SerieVinculoController@index');
			Route::post('/', 'SerieVinculoController@store');
			Route::put('/{cod_serie_v}', 'SerieVinculoController@update');
		});
		Route::post('/seriedisciplina/busca', 'SerieDisciplinaController@index');
		Route::prefix('/professorvinculo')->group(function() {
			Route::get('/', 'ProfessorVinculoController@index');
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
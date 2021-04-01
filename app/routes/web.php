<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::prefix('/api/v1/relatorio')->group(function() {
	Route::get('/atencoes', 'RelatorioController@atencoes');
	Route::get('/inscricoes', 'RelatorioController@inscricoes');
	Route::get('/infoseries', 'RelatorioController@infoSeries');
});

Route::middleware('auth')->group(function () {
	Route::view('/', 'App');
	Route::view('/{any}', 'App');
	Route::view('/{any}/{sub}', 'App');
});
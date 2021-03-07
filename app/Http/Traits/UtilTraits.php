<?php
namespace App\Http\Traits;

trait UtilTraits
{
	/*
	 * Retorna uma string sem caracteres acentos
	 */
	public function removerAcentos($string){
		return preg_replace(
			array("/(á|à|ã|â|ä)/",
				"/(Á|À|Ã|Â|Ä)/",
				"/(é|è|ê|ë)/",
				"/(É|È|Ê|Ë)/",
				"/(í|ì|î|ï)/",
				"/(Í|Ì|Î|Ï)/",
				"/(ó|ò|õ|ô|ö)/",
				"/(Ó|Ò|Õ|Ô|Ö)/",
				"/(ú|ù|û|ü)/",
				"/(Ú|Ù|Û|Ü)/",
				"/(ñ)/","/(Ñ)/",
				"/(ç)/","/(Ç)/"),
			explode(" ","a A e E i I o O u U n N c C"),$string);
	}

	/*
	 * Retorna uma string sem caracteres especiais
	 */
	public function removerEspeciais($string){
		$caracteres = ["'", "!", "@", "#", "$", "%"];
		return str_replace($caracteres,"",$string);
	}

	/*
	 * procura se objeto está vazio
	 * TRUE -> se está vazio
	 * FALSE -> se tem dados
	 */
	public function Objetovazio($array){
		return is_null($array) || empty($array) || $array->count() == 0;
	}

	/**
	 * Verifica se e um objeto
	 * Verifica se o objeto não esta vazio
	 */
	public function existeRegistro($array) {
		return $array && $array->count() > 0;
	}

	/**
	 * Passa todos os caracteres para maiusculo
	 */
	public function upperCase($string) {
		return mb_strtoupper($string, 'utf-8');
	}
}
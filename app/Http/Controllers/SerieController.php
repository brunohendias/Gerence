<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Serie;

class SerieController extends Controller
{
    private $serie;

    public function __construct(Serie $serie)
    {
    	$this->serie = $serie;
    }

    public function index(Request $request)
    {
        try{
            $codserie = $request->codserie;

        	$series = $this->serie
                ->select('cod_serie', 'serie')
                ->when($codserie, function($query) use ($codserie) {
                    return $query->where('codserie', $codserie);
                })
                ->get();

            if ($this->Objetovazio($series)) {
                $msg = 'Não encontramos nenhuma serie.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

        	$msg = 'Series buscado com sucesso.';
        	return $this->RespSuccess($msg, array('msg' => $msg, 'series' => $series));
        } catch (\Exception $e) {
            $msg = 'Houve um erro ao buscar as series.'.$e->getMessage();
            return $this->RespLogErro($e, $msg, 500);
        }
    }}

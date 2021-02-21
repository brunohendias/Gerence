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
            $serie = $this->upperCase($request->serie);

        	$series = $this->serie
                ->select('cod_serie', 'serie')
                ->when($codserie, function($query) use ($codserie) {
                    return $query->where('codserie', $codserie);
                })
                ->when($serie, function($query) use ($serie) {
                    return $query->whereRaw("upper(serie) like '%$serie%'");
                })
                ->get();

            if ($this->Objetovazio($series)) {
                $msg = 'Não encontramos nenhuma série.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

        	$msg = 'Séries buscada com sucesso.';
        	return $this->RespSuccess($msg, array('msg' => $msg, 'series' => $series));
        } catch (\Exception $e) {
            $msg = 'Houve um erro ao buscar as séries.'.$e->getMessage();
            return $this->RespLogErro($e, $msg, 500);
        }
    }

    public function store(Request $request) {
        try {
            $serie = $request->serie;

            $existe = $this->serie->where('serie', $serie)->count();
            if ($existe > 0) {
                $msg = 'Essa série já esta cadastrada.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

            $this->serie->serie = $serie;
            $this->serie->save();

        	$msg = 'Séries cadastrada com sucesso.';
        	return $this->RespSuccess($msg, array('msg' => $msg, 'serie' => $this->serie));
        } catch (\Exception $e) {
            $msg = 'Houve um erro ao cadastrar essa série.'.$e->getMessage();
            return $this->RespLogErro($e, $msg, 500);
        }
    }
}

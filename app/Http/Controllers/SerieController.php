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
        $entidade = 'as séries';
        try{
            $codserie = $request->codserie;
            $serie = $this->upperCase($request->serie);

        	$dados = $this->serie->select('cod_serie', 'serie')
                ->when($codserie, function($query) use ($codserie) {
                    return $query->where('codserie', $codserie);
                })
                ->when($serie, function($query) use ($serie) {
                    return $query->whereRaw("upper(serie) like '%$serie%'");
                })
                ->get();

            if ($this->Objetovazio($dados)) {
                $msg = $this->MsgNotFound('série');
                return $this->RespErrorNormal($msg);
            }

            $msg = $this->MsgSearch($entidade);
            return $this->RespSuccess(array('msg' => $msg, 'dados' => $dados));
        } catch (\Exception $e) {
            $msg = $this->MsgSearch($entidade, 'error');
            return $this->RespLogErro($e, $msg);
        }
    }

    public function store(Request $request) {
        $entidade = 'essa série';
        try {
            $serie = $request->serie;

            $existe = $this->serie->where('serie', $serie)->count();
            if ($existe > 0) {
                $msg = 'Essa série já esta cadastrada.';
                return $this->RespErrorNormal($msg);
            }

            $this->serie->serie = $serie;
            $this->serie->save();

            $msg = $this->MsgRegister($entidade);
	    	return $this->RespSuccess(array('msg' => $msg, 'dado' => $this->serie));
        } catch (\Exception $e) {
            $msg = $this->MsgRegister($entidade, 'error');
			return $this->RespLogErro($e, $msg);
        }
    }
}
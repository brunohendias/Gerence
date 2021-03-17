<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Contracts\SerieInterface;

class SerieController extends Controller
{
    private $interface;

    public function __construct(SerieInterface $interface)
    {
    	$this->interface = $interface;
    }

    public function index(Request $request)
    {
        $entidade = 'as séries';
        try{
        	$dados = $this->interface->index($request);

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
            $existe = $this->interface->index($request);
            if ($existe->count() > 0) {
                $msg = 'Essa série já esta cadastrada.';
                return $this->RespErrorNormal($msg);
            }
            
            $dado = $this->interface->store($request);

            $msg = $this->MsgRegister($entidade);
	    	return $this->RespSuccess(array('msg' => $msg, 'dado' => $dado));
        } catch (\Exception $e) {
            $msg = $this->MsgRegister($entidade, 'error');
			return $this->RespLogErro($e, $msg);
        }
    }
}
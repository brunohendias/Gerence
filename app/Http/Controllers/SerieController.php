<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\SerieInterface;

class SerieController extends Controller
{
    private object $interface;

    public function __construct(SerieInterface $interface)
    {
    	$this->interface = $interface;
    }

    public function index(Request $request): object
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
        } catch (\Exception $exception) {
            $msg = $this->MsgSearch($entidade, 'error');
            return $this->RespLogErro($exception, $msg);
        }
    }

    public function store(Request $request): object
    {
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
        } catch (\Exception $exception) {
            $msg = $this->MsgRegister($entidade, 'error');
			return $this->RespLogErro($exception, $msg);
        }
    }
}
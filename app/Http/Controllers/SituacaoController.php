<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\SituacaoInterface;

class SituacaoController extends Controller
{
    private object $interface;

    public function __construct(SituacaoInterface $interface) {
    	$this->interface = $interface;
    }

    public function index(Request $request): object
    {
        $entidade = 'as situações';
    	try {
            $dados = $this->interface->index($request);

            if ($this->Objetovazio($dados)) {
                $msg = $this->MsgNotFound('situação');
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
        $entidade = 'essa situação';
    	try {
            $this->interface->store($request);

            $msg = $this->MsgRegister($entidade);
	    	return $this->RespSuccess(array('msg' => $msg));
        } catch (\Exception $exception) {
            $msg = $this->MsgRegister($entidade, 'error');
			return $this->RespLogErro($exception, $msg);
        }
    }
}
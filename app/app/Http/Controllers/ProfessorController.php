<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Contracts\ProfessorInterface;

class ProfessorController extends Controller
{
    private object $interface;

    public function __construct(ProfessorInterface $interface)
    {
    	$this->interface = $interface;
    }

    public function index(Request $request): object
    {
        $entidade = 'os professores';
        try{
        	$dados = $this->interface->index();

            if ($this->Objetovazio($dados)) {
                $msg = $this->MsgNotFound('professor');
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
        $entidade = 'esse professor';
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
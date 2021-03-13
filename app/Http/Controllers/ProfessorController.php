<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\ProfessorInterface;

class ProfessorController extends Controller
{
   private $interface;

    public function __construct(ProfessorInterface $interface)
    {
    	$this->interface = $interface;
    }

    public function index(Request $request)
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
        } catch (\Exception $e) {
            $msg = $this->MsgSearch($entidade, 'error');
			return $this->RespLogErro($e, $msg);
        }
    }

    public function store(Request $request) {
        $entidade = 'esse professor';
        try {
            $this->interface->store($request);
            
            $msg = $this->MsgRegister($entidade);
	    	return $this->RespSuccess(array('msg' => $msg));
        } catch (\Exception $e) {
            $msg = $this->MsgRegister($entidade, 'error');
			return $this->RespLogErro($e, $msg);
        }
    }

    public function destroy($id) {
        $entidade = 'esse professor';
        try {
            $dado = $this->interface->find($id);
            
            if ($this->Objetovazio($dado)) {
                $msg = $this->MsgNotFound('professor');
	    		return $this->RespErrorNormal($msg);
            }

            $this->interface->destroy($id);

            $msg = $this->MsgDelete($entidade);
	    	return $this->RespSuccess(array('msg' => $msg));
        } catch (\Exception $e) {
            $msg = $this->MsgDelete($entidade, 'error');
            return $this->RespLogErro($e, $msg, 500);
        }
    }
}
<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Contracts\SerieDisciplinaInterface;

class SerieDisciplinaController extends Controller
{
    private $interface;

    public function __construct(SerieDisciplinaInterface $interface) {
    	$this->interface = $interface;
    }

    public function index(Request $request) {
		$entidade = 'as disciplinas dessa série';
    	try {
    		$dados = $this->interface->index($request);

			if ($this->Objetovazio($dados)) {
				$msg = $this->MsgNotFound('disciplina para essa série');
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
		$entidade = 'essa disciplina nessa série';
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
		$entidade = 'essa disciplina dessa série';
    	try {
    		$dado = $this->interface->find($id);

    		if ($this->Objetovazio($dado)) {
                $msg = $this->MsgNotFound('disciplina');
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
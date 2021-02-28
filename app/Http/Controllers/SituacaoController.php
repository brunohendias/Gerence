<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Situacao;

class SituacaoController extends Controller
{
    private $situacao;

    public function __construct(Situacao $situacao) {
    	$this->situacao = $situacao;
    }

    public function index() {
        $entidade = 'as situações';
    	try {
    		$dados = $this->situacao->select('cod_situacao', 'situacao')
    			->get();

            if ($this->Objetovazio($dados)) {
                $msg = $this->MsgNotFound('situação');
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
        $entidade = 'essa situação';
    	try {

    		$novaSituacao = $this->situacao;
    		$novaSituacao->situacao = $request->situacao;
    		$novaSituacao->save();
    		
            $msg = $this->MsgRegister($entidade);
	    	return $this->RespSuccess(array('msg' => $msg));
        } catch (\Exception $e) {
            $msg = $this->MsgRegister($entidade, 'error');
			return $this->RespLogErro($e, $msg);
        }
    }

    public function destroy($id) {
        $entidade = 'essa situação';
        try {
            $dado = $this->situacao->find($id);

            if ($this->Objetovazio($dado)) {
                $msg = $this->MsgNotFound('situação');
	    		return $this->RespErrorNormal($msg);
            }

            $dado->delete();

            $msg = $this->MsgDelete($entidade);
	    	return $this->RespSuccess(array('msg' => $msg));
        } catch (\Exception $e) {
            $msg = $this->MsgDelete($entidade, 'error');
            return $this->RespLogErro($e, $msg, 500);
        }
    }
}

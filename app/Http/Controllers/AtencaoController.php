<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Atencao;

class AtencaoController extends Controller
{
    private $atencao;

    public function __construct(Atencao $atencao)
    {
    	$this->atencao = $atencao;
    }

    public function index(Request $request)
    {
        $entidade = 'as atenções';
        try{
        	$dados = $this->atencao->select('cod_atencao', 'atencao')->get();

            if ($this->Objetovazio($dados)) {
                $msg = $this->MsgNotFound('atenção');
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
        $entidade = 'essa atenção';
        try {
            $novaAtencao = $this->atencao;
            $novaAtencao->nom_prof = $request->atencao;
            $novaAtencao->save();

            $msg = $this->MsgRegister($entidade);
	    	return $this->RespSuccess(array('msg' => $msg));
        } catch (\Exception $e) {
            $msg = $this->MsgRegister($entidade, 'error');
			return $this->RespLogErro($e, $msg);
        }
    }

    public function destroy($id) {
        $entidade = 'essa atenção';
        try {
            $dado = $this->atencao->find($id);
            
            if ($this->Objetovazio($dado)) {
                $msg = $this->MsgNotFound('atenção');
	    		return $this->RespErrorNormal($msg);
            }

            $msg = $this->MsgDelete($entidade);
	    	return $this->RespSuccess(array('msg' => $msg));
        } catch (\Exception $e) {
            $msg = $this->MsgDelete($entidade, 'error');
            return $this->RespLogErro($e, $msg, 500);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\CandidatoInterface;
use App\Repositories\Contracts\SerieVinculoInterface;

class CandidatoController extends Controller
{
    private $interface;

    public function __construct(CandidatoInterface $interface)
    {
    	$this->interface = $interface;
    }

    public function index(Request $request)
    {
        $entidade = 'os candidatos';
    	try{
            $dados = $this->interface->index($request);

			if ($this->Objetovazio($dados)) {
                $msg = $this->MsgNotFound('candidato');
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
        $entidade = 'esse candidato';
        try {
            $serieVinculoInterface = new SerieVinculoInterface;
            $info = $serieVinculoInterface->find($request->cod_serie_v);

            if($info && $info->qtd_alunos == $info->limite_alunos) {
                $msg = 'Essa turma nesse turno está cheia. Por favor encaixe-o em outra turma.';
                return $this->RespErrorNormal($msg);
            }

            $this->interface->store($request);

            $msg = $this->MsgRegister($entidade);
	    	return $this->RespSuccess(array('msg' => $msg));
        } catch (\Exception $e) {
            $msg = $this->MsgRegister($entidade, 'error');
			return $this->RespLogErro($e, $msg);
        }
    }

    public function destroy($id)
    {
        $entidade = 'esse candidato';
        try{

            $dado = $this->interface->find($id);
            if ($this->Objetovazio($dado)) {
                $msg = $this->MsgNotFound('candidato');
	    		return $this->RespErrorNormal($msg);
            }
            
            $this->interface->destroy($id, $dado->cod_serie_v);

            $msg = $this->MsgDelete($entidade);
	    	return $this->RespSuccess(array('msg' => $msg));
        } catch (\Exception $e) {
            $msg = $this->MsgDelete($entidade, 'error');
            return $this->RespLogErro($e, $msg);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\CandidatoInterface;
use App\Repositories\Contracts\SerieVinculoInterface;

class CandidatoController extends Controller
{
    private object $interface;

    public function __construct(CandidatoInterface $interface)
    {
    	$this->interface = $interface;
    }

    public function index(Request $request): object
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
        } catch (\Exception $exception) {
            $msg = $this->MsgSearch($entidade, 'error');
			return $this->RespLogErro($exception, $msg);
        }
    }

    public function store(Request $request, SerieVinculoInterface $serieVinculo): object
    {
        $entidade = 'esse candidato';
        try {
            $info = $serieVinculo->find($request->cod_serie_v);

            if($info->qtd_alunos == $info->limite_alunos) {
                $msg = 'Essa turma nesse turno está cheia. Por favor encaixe-o em outra turma.';
                return $this->RespErrorNormal($msg);
            }

            $this->interface->store($request, $info);

            $msg = $this->MsgRegister($entidade);
	    	return $this->RespSuccess(array('msg' => $msg));
        } catch (\Exception $exception) {
            $msg = $this->MsgRegister($entidade, 'error');
			return $this->RespLogErro($exception, $msg);
        }
    }

    public function destroy(Int $id, SerieVinculoInterface $serieVinculo): object
    {
        $entidade = 'esse candidato';
        try{
            $aluno = $this->interface->aluno($id);
            if ($this->existeRegistro($aluno)) {
                $msg = 'Não podemos deletar um candidato que se tornou um aluno.';
                return $this->RespErrorNormal($msg);
            }

            $dado = $this->interface->find($id);
            if ($this->Objetovazio($dado)) {
                $msg = $this->MsgNotFound('candidato');
	    		return $this->RespErrorNormal($msg);
            }
            $info = $serieVinculo->find($dado->cod_serie_v);

            $this->interface->destroy($id, $info);

            $msg = $this->MsgDelete($entidade);
	    	return $this->RespSuccess(array('msg' => $msg));
        } catch (\Exception $exception) {
            $msg = $this->MsgDelete($entidade, 'error');
            return $this->RespLogErro($exception, $msg);
        }
    }
}

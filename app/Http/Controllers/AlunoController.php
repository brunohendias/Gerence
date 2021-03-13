<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\AlunoInterface;
use App\Repositories\Contracts\SerieVinculoInterface;

class AlunoController extends Controller
{
    private object $interface;

	private object $serieVinculo;

    public function __construct(AlunoInterface $interface, SerieVinculoInterface $serieVinculo) {
    	$this->interface = $interface;
		$this->serieVinculo = $serieVinculo;
    }

    public function index(Request $request): object
	{
		$entidade = 'os alunos';
    	try {
    		$dados = $this->interface->index($request);

	    	if ($this->Objetovazio($dados)) {
				$msg = $this->MsgNotFound('aluno');
	    		return $this->RespErrorNormal($msg);
	    	}

			$msg = $this->MsgSearch($entidade);
	    	return $this->RespSuccess(array('msg' => $msg, 'dados' => $dados));
    	} catch(\Exception $exception) {
    		$msg = $this->MsgSearch($entidade, 'error');
			return $this->RespLogErro($exception, $msg);
    	}
    }

    public function store(Request $request): object
	{
		$entidade = 'esse aluno';
    	try {
            $info = $this->serieVinculo->find($request->cod_serie_v);
			if ($this->Objetovazio($info)) {
				$msg = $this->MsgNotFound('série');
	    		return $this->RespErrorNormal($msg);
			}

			$aluno = $this->interface->existe($request->cod_can);
			if ($this->existeRegistro($aluno)) {
                $msg = 'Esse candidato já possui um aluno.';
                return $this->RespErrorNormal($msg);
            }

			$dado = $this->interface->store($request, $info);

			$msg = $this->MsgRegister($entidade);
	    	return $this->RespSuccess(array('msg' => $msg, 'dado' => $dado));
    	} catch (\Exception $exception) {
			$msg = $this->MsgRegister($entidade, 'error');
			return $this->RespLogErro($exception, $msg);
    	}
    }
}
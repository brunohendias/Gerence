<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contracts\SerieVinculoInterface;

class SerieVinculoController extends Controller
{
    private object $interface;

    public function __construct(SerieVinculoInterface $interface)
    {
    	$this->interface = $interface;
    }

    public function index(Request $request): object
    {
        $entidade = 'os dados das séries';
        try {
            $dados = $this->interface->index($request);

            if ($this->Objetovazio($dados)) {
                $msg = $this->MsgNotFound('série com informações');
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
            $dado = $this->interface->index($request);
            if ($this->existeRegistro($dado)) {
                $msg = 'Essa série já esta cadastrada com essas informações.';
                return $this->RespErrorNormal($msg);
            }

            $this->interface->store($request);

            $msg = $this->MsgRegister($entidade);
	    	return $this->RespSuccess(array('msg' => $msg));
        } catch (\Exception $exception) {
            $msg = $this->MsgRegister($entidade, 'error');
			return $this->RespLogErro($exception, $msg);
        }
    }

    public function update(Request $request, int $cod_serie_v): object
    {
        $entidade = 'as informações dessa série';
        try {
            $dado = $this->interface->find($cod_serie_v);

            if ($this->Objetovazio($dado)) {
                $msg = $this->MsgNotFound('candidato');
                return $this->RespErrorNormal($msg);
            }

            $dados = $request->only('cod_turno', 'cod_turma', 'limite_alunos', 'cod_prof');
            $this->interface->update($dados, $cod_serie_v);

            $msg = $this->MsgEdit($entidade);
	    	return $this->RespSuccess(array('msg' => $msg));
        } catch (\Exception $exception) {
            $msg = $this->MsgEdit($entidade, 'error');
            return $this->RespLogErro($exception, $msg);
        }
    }
}
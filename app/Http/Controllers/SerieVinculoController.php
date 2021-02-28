<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vinculo\SerieVinculo;

class SerieVinculoController extends Controller
{
    private $serieVinculo;

    public function __construct(SerieVinculo $serieVinculo)
    {
    	$this->serieVinculo = $serieVinculo;
    }

    public function index(Request $request)
    {
        $entidade = 'os dados das séries';
        try {
            $cod_serie = $request->cod_serie;
            $cod_turno = $request->cod_turno;
            $cod_turma = $request->cod_turma;
            $cod_prof = $request->cod_prof;

            $dados = $this->serieVinculo
                ->when($cod_serie, function ($query) use ($cod_serie) {
                    return $query->where('cod_serie', $cod_serie);
                })
                ->when($cod_turno, function ($query) use ($cod_turno) {
                    return $query->where('cod_turno', $cod_turno);
                })
                ->when($cod_turma, function ($query) use ($cod_turma) {
                    return $query->where('cod_turma', $cod_turma);
                })
                ->when($cod_prof, function ($query) use ($cod_prof) {
                    return $query->where('cod_prof', $cod_prof);
                })
                ->with('serie')
                ->with('turno')
                ->with('turma')
                ->with('professor')
                ->get();

            if ($this->Objetovazio($dados)) {
                $msg = $this->MsgNotFound('série com informações');
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
        $entidade = 'essa série';
        try {
            $cod_serie = $request->cod_serie;
            $cod_turno = $request->cod_turno;
            $cod_turma = $request->cod_turma;
            $cod_prof = $request->cod_prof;

            $dado = $this->serieVinculo
                ->where('cod_serie',$cod_serie)
                ->where('cod_turno',$cod_turno)
                ->where('cod_turma',$cod_turma)
                ->when($cod_prof, function ($query) use ($cod_prof) {
                    return $query->where('cod_prof', $cod_prof);
                })
                ->count();
            
            if ($this->existeRegistro($dado)) {
                $msg = 'Essa série já esta cadastrada com essas informações.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

            $this->serieVinculo->cod_serie = $cod_serie;
            $this->serieVinculo->cod_turno = $cod_turno;
            $this->serieVinculo->cod_turma = $cod_turma;
            $this->serieVinculo->cod_prof = $cod_prof;
            $this->serieVinculo->limite_alunos = $request->limite_alunos;
            $this->serieVinculo->save();

            $msg = $this->MsgRegister($entidade);
	    	return $this->RespSuccess(array('msg' => $msg));
        } catch (\Exception $e) {
            $msg = $this->MsgRegister($entidade, 'error');
			return $this->RespLogErro($e, $msg);
        }
    }

    public function update(Request $request, $cod_serie_v) {
        $entidade = 'as informações dessa série';
        try {
            $dado = $this->serieVinculo->select('cod_serie_v','cod_turno','cod_turma','cod_prof','limite_alunos')
                ->where('cod_serie_v', $cod_serie_v)
                ->first();

            if ($this->Objetovazio($dado)) {
                $msg = $this->MsgNotFound('candidato');
                return $this->RespErrorNormal($msg);
            }

            $dados = $request->only('cod_turno','cod_turma','cod_prof','limite_alunos');
            $dado->update($dados);

            $msg = $this->MsgEdit($entidade);
	    	return $this->RespSuccess(array('msg' => $msg));
        } catch (\Exception $e) {
            $msg = $this->MsgEdit($entidade, 'error');
            return $this->RespLogErro($e, $msg, 500);
        }
    }
}
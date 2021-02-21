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

    public function index()
    {
        try{

            $dadosSeries = $this->serieVinculo
                ->with('serie')
                ->with('turno')
                ->with('turma')
                ->get();

            if ($this->Objetovazio($dadosSeries)) {
                $msg = 'Não encontramos nenhuma série.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

        	$msg = 'Encontramos essas séries com sucesso.';
        	return $this->RespSuccess($msg, array('msg' => $msg, 'dadosseries' => $dadosSeries));
        } catch (\Exception $e) {
            $msg = 'Houve um erro ao buscar as informações da série.'.$e->getMessage();
            return $this->RespLogErro($e, $msg, 500);
        }
    }

    public function buscaSeries(Request $request) {
        try{
            $cod_turno = $request->cod_turno;
            $cod_turma = $request->cod_turma;

            if(!$cod_turno) {
                $msg = 'Por favor informe o turno';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

            $series = $this->serieVinculo
                ->select('codserie_v', 'cod_serie')
                ->when($cod_turma, function($query) use ($cod_turma) {
                    return $query->where('cod_turma', $cod_turma);
                })
                ->where('cod_turno', $cod_turno)
                ->with('serie')
                ->get();

            if ($this->Objetovazio($series)) {
                $msg = 'Não encontramos nenhuma serie para esse candidato.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

            $msg = 'Encontramos as series para esse candidato.';
            return $this->RespSuccess($msg, array('msg' => $msg, 'series' => $series));
        } catch (\Exception $e) {
            $msg = 'Houve um erro ao buscar as series para esse candidato.'.$e->getMessage();
            return $this->RespLogErro($e, $msg, 500);
        }
    }

    public function buscaTurnos(Request $request) {
        try{
            $cod_serie = $request->cod_serie;
            $cod_turma = $request->cod_turma;

            if(!$cod_serie) {
                $msg = 'Por favor informe a serie';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

            $turnos = $this->serieVinculo
                ->select('cod_serie_v', 'cod_turno')
                ->with('turno')
                ->when($cod_turma, function($query) use ($cod_turma) {
                    return $query->where('cod_turma', $cod_turma);
                })
                ->where('cod_serie', $cod_serie)
                ->get();

            if ($this->Objetovazio($turnos)) {
                $msg = 'Não encontramos nenhumo turno para esse candidato.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

            $msg = 'Encontramos os turnos para esse candidato.';
            return $this->RespSuccess($msg, array('msg' => $msg, 'turnos' => $turnos));
        } catch (\Exception $e) {
            $msg = 'Houve um erro ao buscar os turnos para esse candidato.'.$e->getMessage();
            return $this->RespLogErro($e, $msg, 500);
        }
    }

    public function buscaTurmas(Request $request) {
        try{
            $cod_serie = $request->cod_serie;
            $cod_turno = $request->cod_turno;

            if(!$cod_turno || !$cod_serie) {
                $msg = 'Para buscar as turmas é preciso informar a serie e o turno.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

            $turmas = $this->serieVinculo
                ->select('cod_serie_v', 'cod_turma', 'qtd_alunos', 'limite_alunos')
                ->where('cod_serie', $cod_serie)
                ->where('cod_turno', $cod_turno)
                ->with('turma')
                ->get();

            if ($this->Objetovazio($turmas)) {
                $msg = 'Não encontramos nenhuma turma para esse candidato.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

            $msg = 'Encontramos as turmas para esse candidato.';
            return $this->RespSuccess($msg, array('msg' => $msg, 'turmas' => $turmas));
        } catch (\Exception $e) {
            $msg = 'Houve um erro ao buscar as turmas para esse candidato.'.$e->getMessage();
            return $this->RespLogErro($e, $msg, 500);
        }
    }

    public function buscaInfos(Request $request) {
        try {
            $cod_serie = $request->cod_serie;
            $cod_turno = $request->cod_turno;
            $cod_turma = $request->cod_turma;

            $dadosseries = $this->serieVinculo
                ->when($cod_serie, function ($query) use ($cod_serie) {
                    return $query->where('cod_serie', $cod_serie);
                })
                ->when($cod_turno, function ($query) use ($cod_turno) {
                    return $query->where('cod_turno', $cod_turno);
                })
                ->when($cod_turma, function ($query) use ($cod_turma) {
                    return $query->where('cod_turma', $cod_turma);
                })
                ->with('serie')
                ->with('turno')
                ->with('turma')
                ->get();

            if ($this->Objetovazio($dadosseries)) {
                $msg = 'Não encontramos nenhuma série com essas informações.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

            $msg = 'Encontramos as séries com essas informações.';
            return $this->RespSuccess($msg, array('msg' => $msg, 'dadosseries' => $dadosseries));
        } catch (\Exception $e) {
            $msg = 'Houve um erro ao buscar as séries com essas informações.'.$e->getMessage();
            return $this->RespLogErro($e, $msg, 500);
        }
    }

    public function store(Request $request) {
        try {
            $cod_serie = $request->cod_serie;
            $cod_turno = $request->cod_turno;
            $cod_turma = $request->cod_turma;

            $existe = $this->serieVinculo
                ->where('cod_serie',$cod_serie)
                ->where('cod_turno',$cod_turno)
                ->where('cod_turma',$cod_turma)
                ->count();
            
            if ($existe > 0) {
                $msg = 'Essa série já esta cadastrada com essas informações.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

            $this->serieVinculo->cod_serie = $cod_serie;
            $this->serieVinculo->cod_turno = $cod_turno;
            $this->serieVinculo->cod_turma = $cod_turma;
            $this->serieVinculo->limite_alunos = $request->limite_alunos;
            $this->serieVinculo->save();

            $msg = 'Cadastramos essa série com sucesso.';
            return $this->RespSuccess($msg, array('msg' => $msg));
        } catch (\Exception $e) {
            $msg = 'Houve um erro ao cadastrar essa série.'.$e->getMessage();
            return $this->RespLogErro($e, $msg, 500);
        }
    }

    public function update(Request $request, $cod_serie_v) {
        try {
            $dadosSerie = $this->serieVinculo->select('cod_serie_v','cod_turno','cod_turma','limite_alunos')
                ->where('cod_serie_v', $cod_serie_v)
                ->first();

            if ($this->Objetovazio($dadosSerie)) {
                $msg = 'Não encontramos as informações dessa série.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

            $dados = $request->only('cod_turno','cod_turma','limite_alunos');
            $dadosSerie->update($dados);

            $msg = 'Alteramos as informações dessa série com sucesso';
            return $this->RespSuccess($msg, array('msg' => $msg));
        } catch (\Exception $e) {
            $msg = 'Houve um erro ao editar as informações dessa série.'.$e->getMessage();
            return $this->RespLogErro($e, $msg, 500);
        }
    }
}
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
                $msg = 'Não encontramos nenhuma serie.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

        	$msg = 'Encontramos essas series com sucesso.';
        	return $this->RespSuccess($msg, array('msg' => $msg, 'dadoseeries' => $dadosSeries));
        } catch (\Exception $e) {
            $msg = 'Houve um erro ao buscar as informações da serie.'.$e->getMessage();
            return $this->RespLogErro($e, $msg, 500);
        }
    }

    public function buscaSeries(Request $request) {
        try{
            $codturno = $request->codturno;
            $codturma = $request->codturma;

            if(!$codturno) {
                $msg = 'Por favor informe o turno';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

            $series = $this->serieVinculo
                ->select('codserie_v', 'codserie')
                ->when($codturma, function($query) use ($codturma) {
                    return $query->where('codturma', $codturma);
                })
                ->where('codturno', $codturno)
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
            $codserie = $request->codserie;
            $codturma = $request->codturma;

            if(!$codserie) {
                $msg = 'Por favor informe a serie';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

            $turnos = $this->serieVinculo
                ->select('codserie_v', 'codturno')
                ->with('turno')
                ->when($codturma, function($query) use ($codturma) {
                    return $query->where('codturma', $codturma);
                })
                ->where('codserie', $codserie)
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
            $codserie = $request->codserie;
            $codturno = $request->codturno;

            if(!$codturno || !$codserie) {
                $msg = 'Para buscar as turmas é preciso informar a serie e o turno.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

            $turmas = $this->serieVinculo
                ->select('codserie_v', 'codturma', 'qtd_alunos', 'limite_alunos')
                ->where('codserie', $codserie)
                ->where('codturno', $codturno)
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
    }}

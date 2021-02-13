<?php

namespace App\Http\Controllers\Vinculo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProfessorVinculo;

class ProfessorVinculoController extends Controller
{
    private $professorVinculo;

	public function __construct(ProfessorVinculo $professorVinculo) {
		$this->professorVinculo = $professorVinculo;
	}

	public function index()
    {
        try{

            $dadosProfessores = $this->professorVinculo
            	->SelectProfessor()
                ->with('professor')
                ->with('serie')
                ->with('turno')
                ->with('atencao')
                ->get();

            if ($this->Objetovazio($dadosProfessores)) {
                $msg = 'Não encontramos nenhum professor.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

        	$msg = 'Encontramos esses professores com sucesso.';
        	return $this->RespSuccess($msg, array('msg' => $msg, 'dadosprofessores' => $dadosProfessores));
        } catch (\Exception $e) {
            $msg = 'Houve um erro ao buscar as informações do professor.'.$e->getMessage();
            return $this->RespLogErro($e, $msg, 500);
        }
    }

    public function buscaProfessores(Request $request) {
        try{
            $codserie = $request->codserie;
            $codturno = $request->codturno;
            $codatencao = $request->codatencao;

            if(!$codserie) {
                $msg = 'Por favor informe a serie';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

            $professores = $this->professorVinculo
                ->select('codprof_v', 'codprof')
                ->when($codturno, function($query) use ($codturno) {
                    return $query->where('codturno', $codturno);
                })
                ->when($codatencao, function($query) use ($codatencao) {
                    return $query->where('codatencao', $codatencao);
                })
                ->where('codserie', $codserie)
                ->with('professor')
                ->get();

            if ($this->Objetovazio($professores)) {
                $msg = 'Não encontramos nenhum professor para esse candidato.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

            $msg = 'Encontramos os professores para esse candidato.';
            return $this->RespSuccess($msg, array('msg' => $msg, 'professores' => $professores));
        } catch (\Exception $e) {
            $msg = 'Houve um erro ao buscar os professores para esse candidato.'.$e->getMessage();
            return $this->RespLogErro($e, $msg, 500);
        }
    }
}
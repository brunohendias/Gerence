<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vinculo\ProfessorVinculo;

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
            $cod_serie = $request->cod_serie;
            $cod_turno = $request->cod_turno;
            $cod_atencao = $request->cod_atencao;

            if(!$cod_serie) {
                $msg = 'Por favor informe a serie';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

            $professores = $this->professorVinculo
                ->select('cod_prof_v', 'cod_prof')
                ->when($cod_turno, function($query) use ($cod_turno) {
                    return $query->where('cod_turno', $cod_turno);
                })
                ->when($cod_atencao, function($query) use ($cod_atencao) {
                    return $query->where('cod_atencao', $cod_atencao);
                })
                ->where('cod_serie', $cod_serie)
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
<?php

namespace App\Http\Controllers\Entidade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Professor;

class ProfessorController extends Controller
{
   private $professor;

    public function __construct(Professor $professor)
    {
    	$this->professor = $professor;
    }

    public function index(Request $request)
    {
        try{
        	$professores = $this->professor
                ->select('codprof', 'nomprof')
                ->get();

            if ($this->Objetovazio($professores)) {
                $msg = 'Não encontramos nenhum professor.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

            $msg = 'Professores buscado com sucesso.';
            return $this->RespSuccess($msg, array('msg' => $msg, 'professores' => $professores));
        } catch (\Exception $e) {
            $msg = 'Houve um erro ao buscar os professores.'.$e->getMessage();
            return $this->RespLogErro($e, $msg, 500);
        }
    }

    public function store(Request $request) {
        try {
            $novoProfessor = $this->professor;
            $novoProfessor->nomprof = $request->nomprof;
            $novoProfessor->save();

            $msg = 'Professor cadastrado com sucesso.';
            return $this->RespSuccess($msg, array('msg' => $msg));
        } catch (\Exception $e) {
            $msg = 'Houve um erro ao cadastrar o professor.'.$e->getMessage();
            return $this->RespLogErro($e, $msg, 500);
        }
    }

    public function destroy($id) {
        try {
            $professor = $this->professor->find($id);
            
            if ($this->Objetovazio($professor)) {
                $msg = 'Não encontramos esse professor.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

            $msg = 'Professor deletado com sucesso.';
            return $this->RespSuccess($msg, array('msg' => $msg));
        } catch (\Exception $e) {
            $msg = 'Houve um erro ao deletar o professor.'.$e->getMessage();
            return $this->RespLogErro($e, $msg, 500);
        }
    }
}
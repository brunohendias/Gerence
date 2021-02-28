<?php

namespace App\Http\Controllers;

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
        $entidade = 'os professores';
        try{
        	$dados = $this->professor
                ->select('cod_prof', 'nom_prof')
                ->get();

            if ($this->Objetovazio($dados)) {
                $msg = $this->MsgNotFound('professor');
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
        $entidade = 'esse professor';
        try {
            $novoProfessor = $this->professor;
            $novoProfessor->nom_prof = $request->nom_prof;
            $novoProfessor->save();

            $msg = $this->MsgRegister($entidade);
	    	return $this->RespSuccess(array('msg' => $msg));
        } catch (\Exception $e) {
            $msg = $this->MsgRegister($entidade, 'error');
			return $this->RespLogErro($e, $msg);
        }
    }

    public function destroy($id) {
        $entidade = 'esse professor';
        try {
            $dado = $this->professor->find($id);
            
            if ($this->Objetovazio($dado)) {
                $msg = $this->MsgNotFound('professor');
	    		return $this->RespErrorNormal($msg);
            }

            $msg = $this->MsgDelete($entidade);
	    	return $this->RespSuccess(array('msg' => $msg));
        } catch (\Exception $e) {
            $msg = $this->MsgDelete($entidade, 'error');
            return $this->RespLogErro($e, $msg, 500);
        }
    }
}
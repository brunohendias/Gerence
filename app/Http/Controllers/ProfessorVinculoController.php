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

            $dados = $this->professorVinculo->SelectProfessor()
                ->with('professor')
                ->with('atencao')
                ->get();

            if ($this->Objetovazio($dados)) {
                $msg = $this->MsgNotFound('dado para esse professor');
                return $this->RespErrorNormal($msg);
            }

            $msg = $this->MsgSearch($entidade);
            return $this->RespSuccess(array('msg' => $msg, 'dados' => $dados));
        } catch (\Exception $e) {
            $msg = $this->MsgSearch($entidade, 'error');
            return $this->RespLogErro($e, $msg);
        }
    }
}
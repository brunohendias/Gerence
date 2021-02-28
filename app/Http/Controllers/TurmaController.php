<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Turma;

class TurmaController extends Controller
{
   	private $turma;

    public function __construct(Turma $turma)
    {
    	$this->turma = $turma;
    }

    public function index(Request $request)
    {
        $entidade = 'as turmas';
        try{
    		$dados = $this->turma->select('cod_turma', 'turma')
                ->get();

            if ($this->Objetovazio($dados)) {
                $msg = $this->MsgNotFound('turma');
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
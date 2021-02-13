<?php

namespace App\Http\Controllers\Entidade;

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
        try{
    		$turmas = $this->turma
                ->select('codturma', 'turma')
                ->get();

            if ($this->Objetovazio($turmas)) {
                $msg = 'Não encontramos nenhuma turma.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

            $msg = 'Turmas buscado com sucesso.';
            return $this->RespSuccess($msg, array('msg' => $msg, 'turmas' => $turmas));
        } catch (\Exception $e) {
            $msg = 'Houve um erro ao buscar as turmas.'.$e->getMessage();
            return $this->RespLogErro($e, $msg, 500);
        }
    }}

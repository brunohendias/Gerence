<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vinculo\AlunoDisciplina;

class AlunoDisciplinaController extends Controller
{
    private $alunoDisciplina;

    public function __construct(AlunoDisciplina $alunoDisciplina) {
    	$this->alunoDisciplina = $alunoDisciplina;
    }

    public function index(Request $request) {
    	try {
    		$cod_aluno = $request->cod_aluno;

    		$dados = $this->alunoDisciplina
    			->select('cod_aluno_disc','nota','disc.disciplina','sr.serie')
    			->join('serie_disciplina sd', 'aluno_disciplina.cod_serie_disc', '=', 'sd.cod_serie_disc')
    			->join('disciplina disc', 'disc.cod_disciplina', '=', 'sd.cod_disciplina')
    			->join('serie sr', 'sr.cod_serie', '=', 'sd.cod_serie')
    			->where('cod_aluno', $cod_aluno)
    			->get();

    		if($this->ObjetoVasio($dados)) {
				$msg = $this->MsgNotFound('nota para esse aluno');
	    		return $this->RespErrorNormal($msg);
    		}

			$msg = $this->MsgSearch('as notas desse aluno');
	    	return $this->RespSuccess(array('msg' => $msg, 'dados' => $dados));
    	} catch (\Exception $e) {
			$msg = $this->MsgSearch('as notas desse aluno.', 'error');
			return $this->RespLogErro($e, $msg);
    	}
    }

    public function store(Request $request) {
    	try {
    		$novaNota = $this->alunoDisciplina;
    		$novaNota->nota = $request->nota;
    		$novaNota->cod_aluno = $request->cod_aluno;
    		$novaNota->cod_serie_disc = $request->cod_serie_disc;
    		$novaNota->save();

			$msg = $this->MsgRegister('essa nota');
    		return $this->RespSuccess(array('msg' => $msg));
    	} catch (\Exception $e) {
			$msg = $this->MsgRegister('essa nota.', 'error');
			return $this->RespLogErro($e, $msg);
    	}
    }
}

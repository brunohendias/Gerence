<?php

namespace App\Http\Controllers\Vinculo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AlunoDisciplina;

class AlunoDisciplinaController extends Controller
{
    private $alunoDisciplina;

    public function __construct(AlunoDisciplina $alunoDisciplina) {
    	$this->alunoDisciplina = $alunoDisciplina;
    }

    public function index(Request $request) {
    	try {
    		$codaluno = $request->codaluno;

    		$notas = $this->alunoDisciplina
    			->select('cod_aluno_disc','nota','disc.disciplina','sr.serie')
    			->join('serie_disciplina sd', 'aluno_disciplina.cod_serie_disc', '=', 'sd.cod_serie_disc')
    			->join('disciplina disc', 'disc.coddisciplina', '=', 'sd.coddisciplina')
    			->join('serie sr', 'sr.codserie', '=', 'sd.codserie')
    			->where('codaluno', $codaluno)
    			->get();

    		if($this->ObjetoVasio($notas)) {
    			$msg = 'Não encontramos nenhuma nota para esse aluno.';
    			return $this->RespErrorNormal($msg, array('msg' => $msg), 400);
    		}

    		$msg = 'Encontramos as notas desse aluno.';
    		return $this->RespSuccess($msg, array('msg' => $msg, 'notas' => $notas));
    	} catch (\Exception $e) {
    		$msg = 'Houve um erro ao buscar as notas desse aluno.';
    		return $this->RespLogErro($e, $msg, 500);
    	}
    }

    public function store(Request $request) {
    	try {
    		$novaNota = $this->alunoDisciplina;
    		$novaNota->nota = $request->nota;
    		$novaNota->codaluno = $request->codaluno;
    		$novaNota->cod_serie_disc = $request->cod_serie_disc;
    		$novaNota->save();

    		$msg = 'Nota cadastrada com sucesso.';
    		return $this->RespSuccess($msg, array('msg' => $msg));
    	} catch (\Exception $e) {
    		$msg = 'Houve um erro ao cadastrar a nota desse aluno.';
    		return $this->RespLogErro($e, $msg, 500);
    	}
    }
}

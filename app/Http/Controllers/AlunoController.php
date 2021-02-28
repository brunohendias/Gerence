<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Candidato;
use App\Models\Vinculo\SerieVinculo;

class AlunoController extends Controller
{
    private $aluno;

    public function __construct(Aluno $aluno) {
    	$this->aluno = $aluno;
    }

    public function index(Request $request) {
    	try {
    		$cod_serie = $request->cod_serie;
    		$cod_turma = $request->cod_turma;
    		$cod_turno = $request->cod_turno;
    		$cod_atencao = $request->cod_atencao;
    		$cod_prof = $request->cod_prof;
    		$cod_situacao = $request->cod_situacao;

    		$alunos = $this->aluno
    			->SelectAluno()
	    		->with('atencao')
	    		->with('situacao')
	    		->when($cod_serie, function ($query) use ($cod_serie) {
	    			return $query->where('cod_serie', $cod_serie);
	    		})
	    		->when($cod_turma, function ($query) use ($cod_turma) {
	    			return $query->where('cod_turma', $cod_turma);
	    		})
	    		->when($cod_turno, function ($query) use ($cod_turno) {
	    			return $query->where('cod_turno', $cod_turno);
	    		})
	    		->when($cod_atencao, function ($query) use ($cod_atencao) {
	    			return $query->where('cod_atencao', $cod_atencao);
	    		})
	    		->when($cod_prof, function ($query) use ($cod_prof) {
	    			return $query->where('cod_prof', $cod_prof);
	    		})
	    		->when($cod_situacao, function ($query) use ($cod_situacao) {
	    			return $query->where('cod_situacao', $cod_situacao);
	    		})
	    		->where('ind_formado', 'N')
	    		->get();

	    	if($this->Objetovazio($alunos)) {
	    		$msg = 'Nenhum aluno com essas informações foi encontrado.';
	    		return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
	    	}

	    	$msg = 'Aluno buscado com sucesso';
	    	return $this->RespSuccess($msg, array('msg' => $msg, 'alunos' => $alunos), 200);
    	} catch(\Exception $e) {
    		$msg = 'Houve um erro ao buscar o aluno.'.$e->getMessage();
    		return $this->RespLogErro($e, $msg, 500);
    	}
    }

    public function store(Request $request) {
    	try {
			$serieVinculo = new SerieVinculo;
            $info = $serieVinculo->select('cod_serie_v','qtd_alunos','limite_alunos')
                ->where('cod_serie_v', $request->cod_serie_v)
                ->first();

			if ($this->Objetovazio($info)) {
				$msg = 'Não encontramos essa série com essas informações.';
				return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
			}

    		$novoAluno = $this->aluno;
            $novoAluno->nom_aluno = $request->nom_can;
            $novoAluno->email = $request->email;
            $novoAluno->telefone = $request->telefone;
            $novoAluno->cpf = $request->cpf;
            $novoAluno->cod_can = $request->cod_can;
            $novoAluno->cod_serie_v = $info->cod_serie_v;
    		$novoAluno->cod_atencao = $request->cod_atencao;
    		$novoAluno->cod_situacao = $request->cod_situacao;
            $novoAluno->num_matricula = $this->gerarNumeroMatricula($novoAluno, $info);
            $novoAluno->save();

	    	$msg = 'Aluno gerado com sucesso.';
	    	return $this->RespSuccess($msg, array('msg' => $msg, 'novoaluno' => $novoAluno), 200);
    	} catch (\Exception $e) {
    		$msg = 'Houve um erro ao gerar o aluno.'.$e->getMessage();
    		return $this->RespLogErro($e, $msg, 500);
    	}
    }

    public function gerarNumeroMatricula($novoAluno, $info) {
    	return "'$novoAluno->cod_can$info->cod_serie$info->cod_turma$info->cod_turno$novoAluno->cod_atencao'";
    }
}

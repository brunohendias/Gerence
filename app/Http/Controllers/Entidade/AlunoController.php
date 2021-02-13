<?php

namespace App\Http\Controllers\Entidade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Candidato;

class AlunoController extends Controller
{
    private $aluno;

    public function __construct(Aluno $aluno) {
    	$this->aluno = $aluno;
    }

    public function index(Request $request) {
    	try {
    		$codserie = $request->codserie;
    		$codturma = $request->codturma;
    		$codturno = $request->codturno;
    		$codatencao = $request->codatencao;
    		$codprof = $request->codprof;
    		$codsituacao = $request->codsituacao;

    		$alunos = $this->aluno
    			->SelectAluno()
	    		->with('serie')
	    		->with('turma')
	    		->with('turno')
	    		->with('atencao')
	    		->with('professor')
	    		->with('situacao')
	    		->when($codserie, function ($query) use ($codserie) {
	    			return $query->where('codserie', $codserie);
	    		})
	    		->when($codturma, function ($query) use ($codturma) {
	    			return $query->where('codturma', $codturma);
	    		})
	    		->when($codturno, function ($query) use ($codturno) {
	    			return $query->where('codturno', $codturno);
	    		})
	    		->when($codatencao, function ($query) use ($codatencao) {
	    			return $query->where('codatencao', $codatencao);
	    		})
	    		->when($codprof, function ($query) use ($codprof) {
	    			return $query->where('codprof', $codprof);
	    		})
	    		->when($codsituacao, function ($query) use ($codsituacao) {
	    			return $query->where('codsituacao', $codsituacao);
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

    		$novoAluno = $this->aluno;
            $novoAluno->nomaluno = $request->nomcan;
            $novoAluno->email = $request->email;
            $novoAluno->telefone = $request->telefone;
            $novoAluno->cpf = $request->cpf;
            $novoAluno->codcan = $request->codcan;
    		$novoAluno->codserie = $request->codserie;
    		$novoAluno->codturma = $request->codturma;
    		$novoAluno->codturno = $request->codturno;
    		$novoAluno->codatencao = $request->codatencao;
    		$novoAluno->codprof = $request->codprof;
    		$novoAluno->codsituacao = $request->codsituacao;
            $novoAluno->num_matricula = $this->gerarNumeroMatricula($novoAluno);
            $novoAluno->save();

            $candidato = new Candidato;
            $candidato = $candidato->find($request->codcan);

            $virouAluno['ind_aluno'] = 'S';
            $candidato->update($virouAluno);

	    	$msg = 'Aluno gerado com sucesso.';
	    	return $this->RespSuccess($msg, array('msg' => $msg, 'novoaluno' => $novoAluno), 200);
    	} catch (\Exception $e) {
    		$msg = 'Houve um erro ao gerar o aluno.'.$e->getMessage();
    		return $this->RespLogErro($e, $msg, 500);
    	}
    }

    public function gerarNumeroMatricula($novoAluno) {
    	return "'$novoAluno->codcan$novoAluno->codserie$novoAluno->codturma$novoAluno->codturno$novoAluno->codatencao'";
    }
}

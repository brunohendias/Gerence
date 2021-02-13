<?php

namespace App\Http\Controllers\Entidade;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidato;
use App\Models\SerieVinculo;
use App\Models\Inscricao;

class CandidatoController extends Controller
{
    private $candidato;

    public function __construct(Candidato $candidato)
    {
    	$this->candidato = $candidato;
    }

    public function index(Request $request)
    {
    	try{
            $codcan = $request->codcan;
            $codserie = $request->codserie;
            $codturma = $request->codturma;
            $codturno = $request->codturno;
            $codatencao = $request->codatencao;
            $codprof = $request->codprof;
            
    		$candidatos = $this->candidato
                ->select('codcan','codserie','codturno','codturma','codatencao','codprof','nomcan', 'email', 'telefone', 'cpf')
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
                ->when($codcan, function($query) use ($codcan) {
                    return $query->where('codcan', $codcan);
                })
                ->with('serie')
                ->with('turma')
                ->with('turno')
                ->with('atencao')
                ->with('professor')
                ->where('ind_aluno', 'N')
                ->get();
			if ($this->Objetovazio($candidatos)) {
                $msg = 'Não encontramos nenhum candidato.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

            $msg = 'Candidatos buscado com sucesso.';
            return $this->RespSuccess($msg, array('msg' => $msg, 'candidatos' => $candidatos));
        } catch (\Exception $e) {
            $msg = 'Houve um erro ao buscar os candidatos.'.$e->getMessage();
            return $this->RespLogErro($e, $msg, 500);
        }
    }

    public function store(Request $request) {
        try {

            $serieVinculo = new SerieVinculo;
            $info = $serieVinculo
                ->select('codserie_v','qtd_alunos','limite_alunos')
                ->where('codserie', $request->codserie)
                ->where('codturma', $request->codturma)
                ->where('codturno', $request->codturno)
                ->first();

            if($info->qtd_alunos == $info->limite_alunos) {
                $msg = 'Essa turma desse turno está cheia. Por favor encaixe-o em outra turma.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);                
            }

            $novoCandidato = $this->candidato;
            $novoCandidato->nomcan = $request->nominsc;
            $novoCandidato->email = $request->email;
            $novoCandidato->telefone = $request->telefone;
            $novoCandidato->cpf = $request->cpf;
            $novoCandidato->codserie = $request->codserie;
            $novoCandidato->codturma = $request->codturma;
            $novoCandidato->codturno = $request->codturno;
            $novoCandidato->codatencao = $request->codatencao;
            $novoCandidato->codprof = $request->codprof;
            $novoCandidato->save();

            $inscricoes = new Inscricao;
            $inscricao = $inscricoes->find($request->codinsc);

            $virouCandidato['ind_candidato'] = 'S';
            $inscricao->update($virouCandidato);

            $dados['qtd_alunos'] = $info->qtd_alunos + 1;
            $info->update($dados);

            $msg = 'Candidato cadastrado com sucesso.';
            return $this->RespSuccess($msg, array('msg' => $msg));
        } catch (\Exception $e) {
            $msg = 'Houve um erro ao cadastrar o candidato.'.$e->getMessage();
            return $this->RespLogErro($e, $msg, 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {

            $candidato = $this->candidato->find($id);
            if ($this->Objetovazio($candidato)) {
                $msg = 'Não encontramos esse candidato.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

            $candidatoData['telefone'] = $request->telefone;
            $candidatoData['email'] = $request->email;
            $candidatoData['codserie'] = $request->codserie;
            $candidatoData['codturma'] = $request->codturma;
            $candidatoData['codturno'] = $request->codturno;
            $candidatoData['codatencao'] = $request->codatencao;
            $candidatoData['codprof'] = $request->codprof;
            $candidato->update($candidatoData);

            $msg = 'Candidato editado com sucesso.';
            return $this->RespSuccess($msg, array('msg' => $msg));
        } catch (\Exception $e) {
            $msg = 'Houve um erro ao editar o candidato.'.$e->getMessage();
            return $this->RespLogErro($e, $msg, 500);
        }
    }

    public function destroy($id)
    {
        try{

            $candidato = $this->candidato->find($id);
            if ($this->Objetovazio($candidato)) {
                $msg = 'Não encontramos esse candidato.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }
            $codserie = $candidato->codserie;
            $codturma = $candidato->codturma;
            $codturno = $candidato->codturno;
            
            $candidato->delete();

            $serieVinculo = new SerieVinculo;
            $info = $serieVinculo
                ->select('codserie_v','qtd_alunos','limite_alunos')
                ->where('codserie', $codserie)
                ->where('codturma', $codturma)
                ->where('codturno', $codturno)
                ->first();

            $removeCandidatoTurma['qtd_alunos'] = $info->qtd_alunos - 1;
            $info->update($removeCandidatoTurma);

            $msg = 'Candidato deletado com sucesso.';
            return $this->RespSuccess($msg, array('msg' => $msg));
        } catch (\Exception $e) {
            $msg = 'Houve um erro ao excluir o candidato.'.$e->getMessage();
            return $this->RespLogErro($e, $msg, 500);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidato;
use App\Models\Vinculo\SerieVinculo;
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
            $cod_can = $request->cod_can;
            $cod_serie = $request->cod_serie;
            $cod_turma = $request->cod_turma;
            $cod_turno = $request->cod_turno;
            $cod_atencao = $request->cod_atencao;
            $cod_prof = $request->cod_prof;
            
    		$candidatos = $this->candidato
                ->select('cod_can','cod_serie','cod_turno','cod_turma','cod_atencao','cod_prof','nom_can','email', 'telefone', 'cpf')
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
                ->when($cod_can, function($query) use ($cod_can) {
                    return $query->where('cod_can', $cod_can);
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
                ->select('cod_serie_v','qtd_alunos','limite_alunos')
                ->where('cod_serie', $request->cod_serie)
                ->where('cod_turma', $request->cod_turma)
                ->where('cod_turno', $request->cod_turno)
                ->first();

            if($info->qtd_alunos == $info->limite_alunos) {
                $msg = 'Essa turma nesse turno está cheia. Por favor encaixe-o em outra turma.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);                
            }

            $novoCandidato = $this->candidato;
            $novoCandidato->nom_can = $request->nom_insc;
            $novoCandidato->email = $request->email;
            $novoCandidato->telefone = $request->telefone;
            $novoCandidato->cpf = $request->cpf;
            $novoCandidato->cod_serie = $request->cod_serie;
            $novoCandidato->cod_turma = $request->cod_turma;
            $novoCandidato->cod_turno = $request->cod_turno;
            $novoCandidato->cod_atencao = $request->cod_atencao;
            $novoCandidato->cod_prof = $request->cod_prof;
            $novoCandidato->save();

            $inscricoes = new Inscricao;
            $inscricao = $inscricoes->find($request->cod_insc);

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
            $candidatoData['cod_serie'] = $request->cod_serie;
            $candidatoData['cod_turma'] = $request->cod_turma;
            $candidatoData['cod_turno'] = $request->cod_turno;
            $candidatoData['cod_atencao'] = $request->cod_atencao;
            $candidatoData['cod_prof'] = $request->cod_prof;
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
            $cod_serie = $candidato->cod_serie;
            $cod_turma = $candidato->cod_turma;
            $cod_turno = $candidato->cod_turno;
            
            $candidato->delete();

            $serieVinculo = new SerieVinculo;
            $info = $serieVinculo
                ->select('cod_serie_v','qtd_alunos','limite_alunos')
                ->where('cod_serie', $cod_serie)
                ->where('cod_turma', $cod_turma)
                ->where('cod_turno', $cod_turno)
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

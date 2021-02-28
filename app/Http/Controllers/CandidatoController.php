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
            $cod_serie = $request->cod_serie;
            $cod_turma = $request->cod_turma;
            $cod_turno = $request->cod_turno;
            $cod_atencao = $request->cod_atencao;
            $cod_prof = $request->cod_prof;
            $cpf = $request->cpf;
            
    		$candidatos = $this->candidato
                ->SelectCandidato()
                ->JoinDadosSerie()
                ->when($cod_atencao, function ($query) use ($cod_atencao) {
                    return $query->where('cod_atencao', $cod_atencao);
                })
                ->when($cod_serie, function($query) use ($cod_serie) {
                    return $query->where('serie_v.cod_serie', $cod_serie);
                })
                ->when($cod_turma, function($query) use ($cod_turma) {
                    return $query->where('serie_v.cod_turma', $cod_turma);
                })
                ->when($cod_turno, function($query) use ($cod_turno) {
                    return $query->where('serie_v.cod_turno', $cod_turno);
                })
                ->when($cod_prof, function($query) use ($cod_prof) {
                    return $query->where('serie_v.cod_prof', $cod_prof);
                })
                ->when($cpf, function($query) use ($cpf) {
                    return $query->where('cpf', $cpf);
                })
                ->with('atencao')
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
            $info = $serieVinculo->select('cod_serie_v','qtd_alunos','limite_alunos')
                ->where('cod_serie_v', $request->cod_serie_v)
                ->first();

            if($this->existeRegistro($info) && $info->qtd_alunos == $info->limite_alunos) {
                $msg = 'Essa turma nesse turno está cheia. Por favor encaixe-o em outra turma.';
                return $this->RespErrorNormal($msg, array('msg' => $msg), 500);
            }

            $novoCandidato = $this->candidato;
            $novoCandidato->nom_can = $request->nom_insc;
            $novoCandidato->email = $request->email;
            $novoCandidato->telefone = $request->telefone;
            $novoCandidato->cpf = $request->cpf;
            $novoCandidato->cod_serie_v = $info->cod_serie_v;
            $novoCandidato->cod_atencao = $request->cod_atencao;
            $novoCandidato->cod_insc = $request->cod_insc;
            $novoCandidato->save();

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

            $candidatoData = $request->only('telefone','email','cod_serie_v','cod_atencao');
            
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
            
            $serie_v = $candidato->cod_serie_v;
            $candidato->delete();

            $serieVinculo = new SerieVinculo;
            $info = $serieVinculo->select('cod_serie_v','qtd_alunos')
                ->where('cod_serie_v', $serie_v)
                ->first();

            if ($this->existeRegistro($info)) {
                $removeCandidatoTurma['qtd_alunos'] = $info->qtd_alunos - 1;
                $info->update($removeCandidatoTurma);
            }

            $msg = 'Candidato deletado com sucesso.';
            return $this->RespSuccess($msg, array('msg' => $msg));
        } catch (\Exception $e) {
            $msg = 'Houve um erro ao excluir o candidato.'.$e->getMessage();
            return $this->RespLogErro($e, $msg, 500);
        }
    }
}

<?php

namespace App\Repositories;

use App\Repositories\Contracts\CandidatoInterface;
use App\Models\Candidato;

class CandidatoRepository implements CandidatoInterface
{
    private $model;

    public function __construct(Candidato $model)
    {
        $this->model = $model;
    }

    public function index($request)
    {
        $cod_serie = $request->cod_serie;
        $cod_turma = $request->cod_turma;
        $cod_turno = $request->cod_turno;
        $cod_atencao = $request->cod_atencao;
        $cod_prof = $request->cod_prof;
        $cpf = $request->cpf;
        
        return $this->model->SelectCandidato()
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
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function aluno($id)
    {
        return $this->model->find($id)->aluno;
    }

    public function inscricao($id)
    {
        return $this->model->find($id)->inscricao;
    }

    public function store($request, $info)
    {
        $this->model->nom_can = $request->nom_insc;
        $this->model->email = $request->email;
        $this->model->telefone = $request->telefone;
        $this->model->cpf = $request->cpf;
        $this->model->cod_serie_v = $request->cod_serie_v;
        $this->model->cod_atencao = $request->cod_atencao;
        $this->model->cod_insc = $request->cod_insc;
        $this->model->save();

        $dados['qtd_alunos'] = ++$info->qtd_alunos;
        
        $info->update($dados);

        return $this->model;
    }

    public function destroy($id, $info) {
        
        $dado = $this->find($id);

        $dado->delete();
        
        $dados['qtd_alunos'] = --$info->qtd_alunos;

        return $info->update($dados);
    }
}
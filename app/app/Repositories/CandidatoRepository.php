<?php

namespace Repositories;

use Contracts\CandidatoInterface;
use App\Models\Candidato;

class CandidatoRepository implements CandidatoInterface
{
    private $model;

    public function __construct(Candidato $model)
    {
        $this->model = $model;
    }

    public function index(object $request): object
    {
        $cod_serie = $request->cod_serie;
        $cod_turma = $request->cod_turma;
        $cod_turno = $request->cod_turno;
        $cod_atencao = $request->cod_atencao;
        $cod_prof = $request->cod_prof;
        $cpf = $request->cpf;
        
        return $this->model->SelectCandidato()
            ->JoinDadosSerie()
            ->when($cod_atencao, function (object $query) use ($cod_atencao): object {
                return $query->where('cod_atencao', $cod_atencao);
            })
            ->when($cod_serie, function(object $query) use ($cod_serie): object {
                return $query->where('serie_v.cod_serie', $cod_serie);
            })
            ->when($cod_turma, function(object $query) use ($cod_turma): object {
                return $query->where('serie_v.cod_turma', $cod_turma);
            })
            ->when($cod_turno, function(object $query) use ($cod_turno): object {
                return $query->where('serie_v.cod_turno', $cod_turno);
            })
            ->when($cod_prof, function(object $query) use ($cod_prof): object {
                return $query->where('serie_v.cod_prof', $cod_prof);
            })
            ->when($cpf, function(object $query) use ($cpf): object {
                return $query->where('cpf', $cpf);
            })
            ->with('atencao')
            ->get();
    }

    public function find(int $id) { return $this->model->find($id); }

    public function aluno(int $id) { return $this->model->find($id)->aluno; }

    public function inscricao(int $id) { return $this->model->find($id)->inscricao; }

    public function store(object $request, object $info): object
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

    public function destroy(int $id, object $info): bool
    {
        $dado = $this->find($id);

        $dado->delete();
        
        $dados = [ 'qtd_alunos' => 0 ];
        
        $dados['qtd_alunos'] = --$info->qtd_alunos;

        return $info->update($dados);
    }
}
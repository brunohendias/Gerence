<?php

namespace App\Repositories;

use App\Repositories\Contracts\AlunoInterface;
use App\Models\Aluno;

class AlunoRepository implements AlunoInterface
{
    private $model;

    public function __construct(Aluno $model)
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
        $cod_situacao = $request->cod_situacao;

        return $this->model->SelectAluno()
            ->JoinDadosSerie()
            ->when($cod_serie, function (object $query) use ($cod_serie): object {
                return $query->where('serie_v.cod_serie', $cod_serie);
            })
            ->when($cod_turma, function (object $query) use ($cod_turma): object {
                return $query->where('serie_v.cod_turma', $cod_turma);
            })
            ->when($cod_turno, function (object $query) use ($cod_turno): object {
                return $query->where('serie_v.cod_turno', $cod_turno);
            })
            ->when($cod_atencao, function (object $query) use ($cod_atencao): object {
                return $query->where('cod_atencao', $cod_atencao);
            })
            ->when($cod_prof, function (object $query) use ($cod_prof): object {
                return $query->where('serie_v.cod_prof', $cod_prof);
            })
            ->when($cod_situacao, function (object $query) use ($cod_situacao): object {
                return $query->where('cod_situacao', $cod_situacao);
            })
            ->with('atencao')
            ->with('situacao')
            ->whereRaw('cod_situacao <> 6')
            ->get();
    }

    public function find(int $id): object|null
    {
        return $this->model->find($id);
    }

    public function existe(int $id): object|null
    {
        return $this->model->where('cod_can', $id)->first();
    }

    public function candidato(int $id): object|null
    {
        return $this->model->find($id)->candidato;
    }

    public function store(object $request, object $info): object
    {
        $this->model->nom_aluno = $request->nom_can;
        $this->model->email = $request->email;
        $this->model->telefone = $request->telefone;
        $this->model->cpf = $request->cpf;
        $this->model->cod_can = $request->cod_can;
        $this->model->cod_serie_v = $request->cod_serie_v;
        $this->model->cod_atencao = $request->cod_atencao;
        $this->model->cod_situacao = $request->cod_situacao;
        $this->model->num_matricula = $this->gerarNumeroMatricula($request, $info);
        $this->model->save();

        return $this->model;
    }
    
    public function gerarNumeroMatricula(object $request, object $info): String
    {
        return "'$request->cod_can$info->cod_serie$info->cod_turma$info->cod_turno$request->cod_atencao'";
    } 
}
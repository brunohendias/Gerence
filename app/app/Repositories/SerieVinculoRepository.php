<?php

namespace Repositories;

use Contracts\SerieVinculoInterface;
use App\Models\Vinculo\SerieVinculo;

class SerieVinculoRepository implements SerieVinculoInterface
{
    private object $model;

    public function __construct(SerieVinculo $model)
    {
        $this->model = $model;
    }

    public function index(object $request): object
    {
        $cod_serie = $request->cod_serie;
        $cod_turno = $request->cod_turno;
        $cod_turma = $request->cod_turma;
        $cod_prof = $request->cod_prof;

        return $this->model
            ->when($cod_serie, function (object $query) use ($cod_serie): object {
                return $query->where('cod_serie', $cod_serie);
            })
            ->when($cod_turno, function (object $query) use ($cod_turno): object {
                return $query->where('cod_turno', $cod_turno);
            })
            ->when($cod_turma, function (object $query) use ($cod_turma): object {
                return $query->where('cod_turma', $cod_turma);
            })
            ->when($cod_prof, function (object $query) use ($cod_prof): object {
                return $query->where('cod_prof', $cod_prof);
            })
            ->with('serie')
            ->with('turno')
            ->with('turma')
            ->with('professor')
            ->orderby('cod_serie', 'ASC')
            ->orderby('cod_turma', 'ASC')
            ->get();
    }

    public function find(int $id): object
    {
        return $this->model->find($id);
    }

    public function store(object $request): object
    {
        $this->model->cod_serie = $request->cod_serie;
        $this->model->cod_turno = $request->cod_turno;
        $this->model->cod_turma = $request->cod_turma;
        $this->model->cod_prof = $request->cod_prof;
        $this->model->limite_alunos = $request->limite_alunos;
        $this->model->save();

        return $this->model;
    }

    public function update(array $request, int $id): bool
    {
        $dado = $this->find($id);

        return $dado->update($request);
    }
}
<?php

namespace Repositories;

use Contracts\SerieVinculoInterface;
use App\Models\Vinculo\SerieVinculo;

class SerieVinculoRepository implements SerieVinculoInterface
{
    private $model;

    public function __construct(SerieVinculo $model)
    {
        $this->model = $model;
    }

    public function index($request) {
        $cod_serie = $request->cod_serie;
        $cod_turno = $request->cod_turno;
        $cod_turma = $request->cod_turma;
        $cod_prof = $request->cod_prof;

        return $this->model
            ->when($cod_serie, function ($query) use ($cod_serie) {
                return $query->where('cod_serie', $cod_serie);
            })
            ->when($cod_turno, function ($query) use ($cod_turno) {
                return $query->where('cod_turno', $cod_turno);
            })
            ->when($cod_turma, function ($query) use ($cod_turma) {
                return $query->where('cod_turma', $cod_turma);
            })
            ->when($cod_prof, function ($query) use ($cod_prof) {
                return $query->where('cod_prof', $cod_prof);
            })
            ->with('serie')
            ->with('turno')
            ->with('turma')
            ->with('professor')
            ->get();
    }

    public function find($id) {
        return $this->model->find($id);
    }

    public function store($request) {
        $this->model->cod_serie = $request->cod_serie;
        $this->model->cod_turno = $request->cod_turno;
        $this->model->cod_turma = $request->cod_turma;
        $this->model->cod_prof = $request->cod_prof;
        $this->model->limite_alunos = $request->limite_alunos;
        $this->model->save();

        return $this->model;
    }

    public function update($request, $id) {
        
        $dado = $this->find($id);

        return $dado->update($request);
    }
}
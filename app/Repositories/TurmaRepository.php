<?php

namespace Repositories;

use Contracts\TurmaInterface;
use App\Models\Turma;

class TurmaRepository implements TurmaInterface
{
    private object $model;

    public function __construct(Turma $model)
    {
        $this->model = $model;
    }

    public function index(object $request): object
    {
        $cod_turma = $request->cod_turma;

        return $this->model->select('cod_turma', 'turma')
            ->when($cod_turma, function (object $query) use ($cod_turma): object {
                return $query->where('cod_turma', $cod_turma);
            })
            ->get();
    }
}
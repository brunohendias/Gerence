<?php

namespace Repositories;

use Contracts\ProfessorVinculoInterface;
use App\Models\Vinculo\ProfessorVinculo;

class ProfessorVinculoRepository implements ProfessorVinculoInterface {

    private $model;

    public function __construct(ProfessorVinculo $model)
    {
        $this->model = $model;
    }

    public function index(): object
    {
        return $this->model->selectprofessor()
            ->with('professor')
            ->with('atencao')
            ->get();
    }
}
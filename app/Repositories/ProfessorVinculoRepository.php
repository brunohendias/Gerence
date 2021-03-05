<?php

namespace App\Repositories;

use App\Repositories\Contracts\ProfessorVinculoInterface;
use App\Models\Vinculo\ProfessorVinculo;

class ProfessorVinculoRepository implements ProfessorVinculoInterface {

    private $model;

    public function __construct(ProfessorVinculo $model)
    {
        $this->model = $model;
    }

    public function index() {
        return $this->model->SelectProfessor()
            ->with('professor')
            ->with('atencao')
            ->get();
    }
}
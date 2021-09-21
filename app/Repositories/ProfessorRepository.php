<?php

namespace Repositories;

use Contracts\ProfessorInterface;
use App\Models\Professor;

class ProfessorRepository implements ProfessorInterface
{
    private object $model;

    public function __construct(Professor $model)
    {
        $this->model = $model;
    }

    public function index(): object
    {
        return $this->model->select('cod_prof', 'nom_prof')->get();
    }

    public function find(int $id): object
    {
        return $this->model->find($id);
    }
    
    public function store(object $request): object
    {
        $this->model->nom_prof = $request->nom_prof;
        $this->model->save();

        return $this->model;
    }
}

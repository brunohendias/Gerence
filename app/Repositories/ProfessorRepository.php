<?php

namespace App\Repositories;

use App\Repositories\Contracts\ProfessorInterface;
use App\Models\Professor;

class ProfessorRepository implements ProfessorInterface
{
    private $model;

    public function __construct(Professor $model)
    {
        $this->model = $model;
    }

    public function index() {
        return $this->model->select('cod_prof', 'nom_prof')->get();
    }

    public function find($id) {
        return $this->model->find($id);
    }
    
    public function store($request) {
        $this->model->nom_prof = $request->nom_prof;
        $this->model->save();

        return $this->model;
    }
    
    public function destroy($id) {
        return $this->model->delete($id);
    }
}

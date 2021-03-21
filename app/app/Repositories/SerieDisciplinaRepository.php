<?php

namespace Repositories;

use Contracts\SerieDisciplinaInterface;
use App\Models\Vinculo\SerieDisciplina;

class SerieDisciplinaRepository implements SerieDisciplinaInterface
{
    private $model;

    public function __construct(SerieDisciplina $model)
    {
        $this->model = $model;
    }

    public function index(object $request): object
    {
        $cod_serie = $request->cod_serie;

        return $this->model->select('cod_serie_disc','cod_disciplina')
            ->with('disciplina')
            ->where('cod_serie', $cod_serie)
            ->get();
    }

    public function find(int $id): object
    {
        return $this->model->find($id);
    }
    
    public function store(object $request): object
    {
        $this->model->cod_serie = $request->cod_serie;
        $this->model->cod_disciplina = $request->cod_disciplina;
        $this->model->save();

        return $this->model;
    }
    
    public function destroy(int $id): bool
    {
        $dado = $this->find($id);

        return $dado->delete();
    }
}

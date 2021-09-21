<?php

namespace Repositories;

use Contracts\SerieInterface;
use App\Models\Serie;

class SerieRepository implements SerieInterface
{
    private object $model;

    public function __construct(Serie $model)
    {
        $this->model = $model;
    }
    
    public function index(object $request): object
    {
        $codserie = $request->cod_serie;
        $serie = $request->serie;

        return $this->model->select('cod_serie', 'serie')
            ->when($codserie, function (object $query) use ($codserie): object {
                return $query->where('cod_serie', $codserie);
            })
            ->when($serie, function (object $query) use ($serie): object {
                return $query->where('serie', $serie);
            })->get();
    }

    public function store(object $request): object
    {
        $this->model->serie = $request->serie;
        $this->model->save();

        return $this->model;
    }
}
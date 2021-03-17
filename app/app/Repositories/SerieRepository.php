<?php

namespace Repositories;

use Contracts\SerieInterface;
use App\Models\Serie;

class SerieRepository implements SerieInterface {
    
    private $model;

    public function __construct(Serie $model)
    {
        $this->model = $model;
    }
    
    public function index($request) {
        
        $codserie = $request->cod_serie;
        $serie = $request->serie;

        return $this->model->select('cod_serie', 'serie')
            ->when($codserie, function($query) use ($codserie) {
                return $query->where('cod_serie', $codserie);
            })
            ->when($serie, function($query) use ($serie) {
                return $query->where('serie', $serie);
            })->get();
    }

    public function store($request) {
        
        $this->model->serie = $request->serie;
        $this->model->save();

        return $this->model;
    }
}
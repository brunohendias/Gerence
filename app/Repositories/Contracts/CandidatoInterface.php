<?php

namespace App\Repositories\Contracts;

interface CandidatoInterface
{
    public function index($request);
    
    public function find($id);
    
    public function store($request);
    
    public function destroy($id, $cod_serie_v);
}
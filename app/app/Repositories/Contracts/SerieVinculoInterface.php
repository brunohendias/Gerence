<?php

namespace Contracts;

interface SerieVinculoInterface {
    
    public function index($request);

    public function find($id);

    public function store($request);

    public function update($request, $id);
}
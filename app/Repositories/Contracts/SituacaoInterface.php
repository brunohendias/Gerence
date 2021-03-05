<?php

namespace App\Repositories\Contracts;

interface SituacaoInterface {
    
    public function index($request);

    public function store($request);

    public function destroy($id);
}
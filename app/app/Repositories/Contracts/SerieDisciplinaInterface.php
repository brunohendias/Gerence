<?php

namespace App\Repositories\Contracts;

interface SerieDisciplinaInterface {
    
    public function index($request);

    public function find($id);
    
    public function store($request);
    
    public function destroy($id);
}
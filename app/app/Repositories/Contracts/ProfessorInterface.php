<?php

namespace App\Repositories\Contracts;

interface ProfessorInterface {
    
    public function index();

    public function find($id);

    public function store($request);
    
    public function destroy($id);
}
<?php

namespace App\Repositories\Contracts;

interface CandidatoInterface
{
    public function index($request);
    
    public function find($id);
    
    public function store($request, $info);
    
    public function destroy($id, $info);
}
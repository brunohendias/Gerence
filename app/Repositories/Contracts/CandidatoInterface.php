<?php

namespace App\Repositories\Contracts;

interface CandidatoInterface
{
    public function index($request);
    
    public function find($id);

    public function aluno($id);

    public function inscricao($id);

    public function store($request, $info);
    
    public function destroy($id, $info);
}
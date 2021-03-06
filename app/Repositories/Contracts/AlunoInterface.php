<?php

namespace App\Repositories\Contracts;

interface AlunoInterface
{
    public function index($request);

    public function find($id);

    public function existe($id);

    public function candidato($id);

    public function store($request, $info);
    
    public function gerarNumeroMatricula($request, $info);
}
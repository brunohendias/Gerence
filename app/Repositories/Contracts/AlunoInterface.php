<?php

namespace App\Repositories\Contracts;

interface AlunoInterface
{
    public function index($request);

    public function find($id);

    public function store($request);
    
    public function gerarNumeroMatricula($request);
}
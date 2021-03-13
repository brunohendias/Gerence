<?php

namespace App\Repositories\Contracts;

interface AlunoInterface
{
    public function index(object $request): object;

    public function find(int $id): object|null;

    public function existe(int $id): object|null;

    public function candidato(int $id): object|null;

    public function store(object $request, object $info): object;
    
    public function gerarNumeroMatricula(object $request, object $info): String;
}
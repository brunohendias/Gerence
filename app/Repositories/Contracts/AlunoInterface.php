<?php

namespace Contracts;

interface AlunoInterface
{
    public function index(object $request): object;

    public function find(int $id);

    public function existe(int $id);

    public function candidato(int $id);

    public function store(object $request, object $info): object;
    
    public function gerarNumeroMatricula(object $request, object $info): String;
}
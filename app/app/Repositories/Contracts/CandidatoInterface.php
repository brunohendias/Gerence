<?php

namespace Contracts;

interface CandidatoInterface
{
    public function index(object $request): object;
    
    public function find(int $id);

    public function aluno(int $id);

    public function inscricao(int $id);

    public function store(object $request, object $info): object;
    
    public function destroy(int $id, object $info): bool;
}
<?php

namespace Contracts;

interface CandidatoInterface
{
    public function index(object $request): object;
    
    public function find(int $id): object|null;

    public function aluno(int $id): object|null;

    public function inscricao(int $id): object|null;

    public function store(object $request, object $info): object;
    
    public function destroy(int $id, object $info): bool;
}
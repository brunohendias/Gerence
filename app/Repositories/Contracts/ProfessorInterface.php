<?php

namespace Contracts;

interface ProfessorInterface 
{
    public function index(): object;

    public function find(int $id): object;

    public function store(object $request): object;
}
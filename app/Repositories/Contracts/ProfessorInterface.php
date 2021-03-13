<?php

namespace App\Repositories\Contracts;

interface ProfessorInterface {
    
    public function index(): object;

    public function find(int $id): object;

    public function store(object $request): object;
    
    public function destroy(int $id): object;
}
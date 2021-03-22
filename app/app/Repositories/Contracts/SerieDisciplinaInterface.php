<?php

namespace Contracts;

interface SerieDisciplinaInterface {
    
    public function index(object $request): object;

    public function find(int $id): object;
    
    public function store(object $request): object;
    
    public function destroy(int $id): bool;
}
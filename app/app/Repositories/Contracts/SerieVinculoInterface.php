<?php

namespace Contracts;

interface SerieVinculoInterface {
    
    public function index(object $request): object;

    public function find(int $id): object;

    public function store(object $request): object;

    public function update(array $request, int $id): bool;
}
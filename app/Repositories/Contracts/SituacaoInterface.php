<?php

namespace App\Repositories\Contracts;

interface SituacaoInterface {
    
    public function index(object $request): object;

    public function store(object $request): object;
}
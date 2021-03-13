<?php

namespace App\Repositories\Contracts;

interface TurmaInterface {
    
    public function index(object $request): object;
}
<?php

namespace App\Repositories\Contracts;

interface TurnoInterface {
    
    public function index(object $request): object;
}
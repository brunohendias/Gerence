<?php

namespace App\Repositories\Contracts;

interface InscricaoInterface
{
    public function index(object $request): object;
}
<?php

namespace App\Repositories\Contracts;

interface SerieInterface {
    
    public function index($request);

    public function store($request);
}
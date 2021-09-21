<?php

namespace Contracts;

interface SerieInterface 
{
    public function index(object $request): object;

    public function store(object $request): object;
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
	protected $connection = 'mysql';
    protected $table = 'disciplina';
    protected $primaryKey = 'coddisciplina';
}
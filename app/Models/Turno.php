<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
	protected $connection = 'mysql';
    protected $table = 'turno';
    protected $primaryKey = 'codturno';
}

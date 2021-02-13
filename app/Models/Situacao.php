<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Situacao extends Model
{
	protected $connection = 'mysql';
    protected $table = 'situacao';
    protected $primaryKey = 'codsituacao';
}

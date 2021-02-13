<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
	protected $connection = 'mysql';
    protected $table = 'serie';
    protected $primaryKey = 'codserie';
}
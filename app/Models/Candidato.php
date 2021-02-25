<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Vinculo\SerieVinculo;
use App\Models\Atencao;
use App\Models\Serie;
use App\Models\Turno;
use App\Models\Turma;
use App\Models\Professor;
use App\Models\inscricao;

class Candidato extends Model
{
	protected $connection = 'mysql';
    protected $table = 'candidato';
    protected $primaryKey = 'cod_can';
    public $fillable = [ 'telefone','email','cod_serie_v','cod_atencao' ];

    public function atencao()
    {
        return $this->hasOne(Atencao::class, 'cod_atencao', 'cod_atencao')->select('cod_atencao', 'atencao');
    }

    public function inscricao()
    {
        return $this->hasOne(inscricao::class, 'cod_insc', 'cod_insc');
    }
}

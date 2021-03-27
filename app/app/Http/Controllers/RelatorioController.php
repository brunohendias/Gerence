<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Relatorios\AtencaoExport;
use Relatorios\InfoSeriesExport;
use Relatorios\InscricaoExport;
use Repositories\AtencaoRepository;

class RelatorioController extends Controller
{
    private array $retorno = [
        'msg' => 'Estamos gerando o relatorio. Iremos enviar uma notificação assim que terminar!'
    ];

    private string $fila = 'relatorio';

    protected function atencoes(AtencaoRepository $repository): object 
        { return new AtencaoExport($repository); }

    protected function inscricoes(Request $request): object
        { return new InscricaoExport($request->cod_serie); }

    protected function infoSeries(): object
    {
        (new InfoSeriesExport)
            ->store('infoserie.xlsx')
            ->allOnQueue($this->fila);

        return $this->RespSuccess($this->retorno);
    }
}
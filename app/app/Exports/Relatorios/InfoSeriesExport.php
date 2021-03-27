<?php

namespace Relatorios;

use App\Models\Vinculo\SerieVinculo;
use Illuminate\Contracts\Queue\ShouldQueue;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Excel;

class InfoSeriesExport implements FromCollection, WithHeadings, WithMapping, ShouldQueue
{
    use Exportable;

    private $fileName = 'infoseries.xlsx';
    
    private $writerType = Excel::XLSX;
    
    private $headers = [
        'Content-Type' => 'text/csv',
    ];

    public function headings(): array
    {
        return [
            'codigo',
            'serie',
            'turno',
            'turma',
            'professor',
            'qtd de alunos',
            'limite de alunos'
        ];
    }

    public function collection(): object
    {
        return SerieVinculo::with('serie')->with('turno')->with('turma')->with('professor')->get();
    }

    public function map($dado): array
    {
        return [
            $dado->cod_serie_v,
            $dado->serie->serie,
            $dado->turno->turno,
            $dado->turma->turma,
            $dado->professor->nom_prof,
            $dado->qtd_alunos,
            $dado->limite_alunos
        ];
    }
}
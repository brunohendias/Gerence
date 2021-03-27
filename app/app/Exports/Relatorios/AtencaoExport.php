<?php

namespace Relatorios;

use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Excel;

class AtencaoExport implements FromCollection, WithHeadings, Responsable
{
    use Exportable;

    private object $repository;
    
    public function __construct(object $repository)
    {
        $this->repository = $repository;
    }
    
    private $fileName = 'atencoes.xlsx';
    
    private $writerType = Excel::XLSX;
    
    private $headers = [
        'Content-Type' => 'text/csv',
    ];
    
    public function headings(): array
    {
        return [
            'cod_atencao',
            'atencao',
        ];
    }

    public function collection(): object
    {
        return $this->repository->index();
    }
}
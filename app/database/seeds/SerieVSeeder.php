<?php

use Illuminate\Database\Seeder;

class SerieVSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayRegisters = [
            ['s' => 1, 't' => 1, 'ta' => 1, 'p' => 1],
            ['s' => 1, 't' => 1, 'ta' => 2, 'p' => 10],
            ['s' => 1, 't' => 1, 'ta' => 3, 'p' => 1],
            ['s' => 2, 't' => 1, 'ta' => 1, 'p' => 2],
            ['s' => 2, 't' => 1, 'ta' => 2, 'p' => 11],
            ['s' => 3, 't' => 2, 'ta' => 1, 'p' => 2],
            ['s' => 3, 't' => 2, 'ta' => 2, 'p' => 12],
            ['s' => 3, 't' => 2, 'ta' => 3, 'p' => 3],
            ['s' => 4, 't' => 2, 'ta' => 1, 'p' => 10],
            ['s' => 4, 't' => 2, 'ta' => 2, 'p' => 4],
            ['s' => 5, 't' => 1, 'ta' => 1, 'p' => 11],
            ['s' => 5, 't' => 1, 'ta' => 2, 'p' => 4],
            ['s' => 6, 't' => 1, 'ta' => 1, 'p' => 12],
            ['s' => 6, 't' => 1, 'ta' => 2, 'p' => 5],
            ['s' => 7, 't' => 2, 'ta' => 1, 'p' => 10],
            ['s' => 7, 't' => 2, 'ta' => 2, 'p' => 6],
            ['s' => 7, 't' => 2, 'ta' => 3, 'p' => 11],
            ['s' => 8, 't' => 2, 'ta' => 1, 'p' => 6],
            ['s' => 8, 't' => 2, 'ta' => 2, 'p' => 12],
            ['s' => 9, 't' => 1, 'ta' => 1, 'p' => 7],
            ['s' => 9, 't' => 1, 'ta' => 2, 'p' => 10],
            ['s' => 10, 't' => 1, 'ta' => 1, 'p' => 8],
            ['s' => 10, 't' => 1, 'ta' => 2, 'p' => 11],
            ['s' => 11, 't' => 1, 'ta' => 1, 'p' => 8],
            ['s' => 11, 't' => 1, 'ta' => 2, 'p' => 12],
            ['s' => 12, 't' => 1, 'ta' => 1, 'p' => 9],
            ['s' => 12, 't' => 1, 'ta' => 2, 'p' => 10]
        ];

        foreach ($arrayRegisters as $register) {
            \DB::table('serie_v')->insert([
                'qtd_alunos' => 0,
                'limite_alunos' => 20,
                'cod_serie' => $register['s'],
                'cod_turno' => $register['t'],
                'cod_turma' => $register['ta'],
                'cod_prof' => $register['p']
            ]);
        };
    }
}
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
            ['s' => 1, 't' => 1, 'ta' => 1],
            ['s' => 1, 't' => 1, 'ta' => 2],
            ['s' => 1, 't' => 1, 'ta' => 3],
            ['s' => 2, 't' => 1, 'ta' => 1],
            ['s' => 2, 't' => 1, 'ta' => 2],
            ['s' => 3, 't' => 2, 'ta' => 1],
            ['s' => 3, 't' => 2, 'ta' => 2],
            ['s' => 3, 't' => 2, 'ta' => 3],
            ['s' => 4, 't' => 2, 'ta' => 1],
            ['s' => 4, 't' => 2, 'ta' => 2],
            ['s' => 5, 't' => 1, 'ta' => 1],
            ['s' => 5, 't' => 1, 'ta' => 2],
            ['s' => 6, 't' => 1, 'ta' => 1],
            ['s' => 6, 't' => 1, 'ta' => 2],
            ['s' => 7, 't' => 2, 'ta' => 1],
            ['s' => 7, 't' => 2, 'ta' => 2],
            ['s' => 7, 't' => 2, 'ta' => 3],
            ['s' => 8, 't' => 2, 'ta' => 1],
            ['s' => 8, 't' => 2, 'ta' => 2],
            ['s' => 9, 't' => 1, 'ta' => 1],
            ['s' => 9, 't' => 1, 'ta' => 2],
            ['s' => 10, 't' => 1, 'ta' => 1],
            ['s' => 10, 't' => 1, 'ta' => 2],
            ['s' => 11, 't' => 1, 'ta' => 1],
            ['s' => 11, 't' => 1, 'ta' => 2],
            ['s' => 12, 't' => 1, 'ta' => 1],
            ['s' => 12, 't' => 1, 'ta' => 2]
        ];

        foreach ($arrayRegisters as $register) {
            \DB::table('serie_v')->insert([
                'qtd_alunos' => 0,
                'limite_alunos' => 20,
                'cod_serie' => $register['s'],
                'cod_turno' => $register['t'],
                'cod_turma' => $register['ta']
            ]);
        };
    }
}
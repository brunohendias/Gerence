<?php

use Illuminate\Database\Seeder;

class ProfessorVSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayRegisters = [
            ['p' => 1, 's' => 1, 't' => 1, 'a' => 1],
            ['p' => 1, 's' => 1, 't' => 1, 'a' => 2],
            ['p' => 1, 's' => 1, 't' => 1, 'a' => 3],
            ['p' => 2, 's' => 2, 't' => 1, 'a' => 1],
            ['p' => 2, 's' => 2, 't' => 1, 'a' => 3],
            ['p' => 2, 's' => 2, 't' => 1, 'a' => 4],
            ['p' => 3, 's' => 3, 't' => 2, 'a' => 1],
            ['p' => 3, 's' => 3, 't' => 2, 'a' => 2],
            ['p' => 3, 's' => 3, 't' => 2, 'a' => 5],
            ['p' => 4, 's' => 4, 't' => 2, 'a' => 1],
            ['p' => 4, 's' => 4, 't' => 2, 'a' => 4],
            ['p' => 4, 's' => 4, 't' => 2, 'a' => 4],
            ['p' => 5, 's' => 5, 't' => 1, 'a' => 1],
            ['p' => 5, 's' => 5, 't' => 1, 'a' => 3],
            ['p' => 5, 's' => 5, 't' => 1, 'a' => 5],
            ['p' => 6, 's' => 6, 't' => 1, 'a' => 1],
            ['p' => 6, 's' => 6, 't' => 1, 'a' => 2],
            ['p' => 6, 's' => 6, 't' => 1, 'a' => 3],
            ['p' => 7, 's' => 7, 't' => 2, 'a' => 1],
            ['p' => 7, 's' => 7, 't' => 2, 'a' => 2],
            ['p' => 7, 's' => 7, 't' => 2, 'a' => 3],
            ['p' => 8, 's' => 8, 't' => 2, 'a' => 1],
            ['p' => 8, 's' => 8, 't' => 2, 'a' => 3],
            ['p' => 8, 's' => 8, 't' => 2, 'a' => 3],
            ['p' => 9, 's' => 9, 't' => 1, 'a' => 1],
            ['p' => 9, 's' => 9, 't' => 1, 'a' => 2],
            ['p' => 9, 's' => 9, 't' => 1, 'a' => 4],
            ['p' => 10, 's' => 10, 't' => 1, 'a' => 1],
            ['p' => 10, 's' => 10, 't' => 1, 'a' => 4],
            ['p' => 10, 's' => 10, 't' => 1, 'a' => 5],
            ['p' => 11, 's' => 11, 't' => 1, 'a' => 1],
            ['p' => 11, 's' => 11, 't' => 1, 'a' => 2],
            ['p' => 11, 's' => 11, 't' => 1, 'a' => 3],
            ['p' => 12, 's' => 12, 't' => 1, 'a' => 1],
            ['p' => 12, 's' => 12, 't' => 1, 'a' => 3],
            ['p' => 12, 's' => 12, 't' => 1, 'a' => 4],
            ['p' => 12, 's' => 12, 't' => 1, 'a' => 3],
        ];

        foreach ($arrayRegisters as $register) {
            \DB::table('professor_v')->insert([
                'cod_prof' => $register['p'],
                'cod_serie' => $register['s'],
                'cod_turno' => $register['t'],
                'cod_atencao' => $register['a'],
            ]);
        };
    }
}

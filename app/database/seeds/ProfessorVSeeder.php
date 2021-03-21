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
            ['p' => 1, 'a' => 1],
            ['p' => 1, 'a' => 2],
            ['p' => 1, 'a' => 3],
            ['p' => 2, 'a' => 1],
            ['p' => 2, 'a' => 3],
            ['p' => 2, 'a' => 4],
            ['p' => 3, 'a' => 1],
            ['p' => 3, 'a' => 2],
            ['p' => 3, 'a' => 5],
            ['p' => 4, 'a' => 1],
            ['p' => 4, 'a' => 4],
            ['p' => 4, 'a' => 4],
            ['p' => 5, 'a' => 1],
            ['p' => 5, 'a' => 3],
            ['p' => 5, 'a' => 5],
            ['p' => 6, 'a' => 1],
            ['p' => 6, 'a' => 2],
            ['p' => 6, 'a' => 3],
            ['p' => 7, 'a' => 1],
            ['p' => 7, 'a' => 2],
            ['p' => 7, 'a' => 3],
            ['p' => 8, 'a' => 1],
            ['p' => 8, 'a' => 3],
            ['p' => 8, 'a' => 3],
            ['p' => 9, 'a' => 1],
            ['p' => 9, 'a' => 2],
            ['p' => 9, 'a' => 4],
            ['p' => 10, 'a' => 1],
            ['p' => 10, 'a' => 4],
            ['p' => 10, 'a' => 5],
            ['p' => 11, 'a' => 1],
            ['p' => 11, 'a' => 2],
            ['p' => 11, 'a' => 3],
            ['p' => 12, 'a' => 1],
            ['p' => 12, 'a' => 3],
            ['p' => 12, 'a' => 4],
            ['p' => 12, 'a' => 3]
        ];

        foreach ($arrayRegisters as $register) {
            \DB::table('professor_v')->insert([
                'cod_prof' => $register['p'],
                'cod_atencao' => $register['a'],
            ]);
        };
    }
}

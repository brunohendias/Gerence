<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProfessorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayRegisters = [
            'Andre',
            'Maria',
            'Marta',
            'Bernardo',
            'Pedro',
            'Camila',
            'Vanessa',
            'Rodrigo',
            'Leonora',
            'Leticia',
            'Marilda',
            'Paula',
            'Sonia'
        ];

        foreach ($arrayRegisters as $register) {
            \DB::table('professor')->insert([
                'nom_prof' => $register
            ]);
        };
    }
}

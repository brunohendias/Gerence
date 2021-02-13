<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TurnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayRegisters = [
            'Manhã', 'Tarde'
        ];

        foreach ($arrayRegisters as $register) {
            \DB::table('turno')->insert([
                'turno' => $register
            ]);
        };
    }
}

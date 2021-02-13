<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SerieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayRegisters = [
            '1ª ano ensino fundamental',
            '2ª ano ensino fundamental',
            '3ª ano ensino fundamental',
            '4ª ano ensino fundamental',
            '5ª ano ensino fundamental',
            '6ª ano ensino fundamental',
            '7ª ano ensino fundamental',
            '8ª ano ensino fundamental',
            '9ª ano ensino fundamental',
            '1ª ano ensino medio',
            '2ª ano ensino medio',
            '3ª ano ensino medio'
        ];

        foreach ($arrayRegisters as $register) {
            \DB::table('serie')->insert([
                'serie' => $register
            ]);
        };
    }
}

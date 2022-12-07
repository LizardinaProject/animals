<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnimalKindSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animal_kinds')->insert([
            'kind' => 'Лысый кот',
            'icon' => 'bold_cat.png',
            'picture' => 'bold_cat_big.png',
            'max_size' => '10',
            'max_age' => '100',
            'growth_factor' => '0.5',
        ]);
        DB::table('animal_kinds')->insert([
            'kind' => 'Собака',
            'icon' => 'dog.png',
            'picture' => 'dog_big.png',
            'max_size' => '20',
            'max_age' => '150',
            'growth_factor' => '1',
        ]);
        DB::table('animal_kinds')->insert([
            'kind' => 'Птица',
            'icon' => 'bird.png',
            'picture' => 'bird_big.png',
            'max_size' => '8',
            'max_age' => '100',
            'growth_factor' => '0.5',
        ]);
        DB::table('animal_kinds')->insert([
            'kind' => 'Шерстяной кот',
            'icon' => 'fluffy_cat.png',
            'picture' => 'fluffy_cat_big.png',
            'max_size' => '350',
            'max_age' => '100',
            'growth_factor' => '1.5',
        ]);
    }
}

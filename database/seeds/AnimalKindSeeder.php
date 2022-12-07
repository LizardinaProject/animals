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
            'icon' => '/images/icons/bold_cat.png',
            'picture' => '/images/pictures/bold_cat_big.png',
            'max_size' => '150',
            'max_age' => '100',
            'growth_factor' => '2',
        ]);
        DB::table('animal_kinds')->insert([
            'kind' => 'Собака',
            'icon' => '/images/icons/dog.png',
            'picture' => '/images/pictures/dog_big.png',
            'max_size' => '200',
            'max_age' => '150',
            'growth_factor' => '1',
        ]);
        DB::table('animal_kinds')->insert([
            'kind' => 'Птица',
            'icon' => '/images/icons/bird.png',
            'picture' => '/images/pictures/bird_big.png',
            'max_size' => '300',
            'max_age' => '100',
            'growth_factor' => '2',
        ]);
        DB::table('animal_kinds')->insert([
            'kind' => 'Шерстяной кот',
            'icon' => '/images/icons/fluffy_cat.png',
            'picture' => '/images/pictures/fluffy_cat_big.png',
            'max_size' => '400',
            'max_age' => '100',
            'growth_factor' => '2',
        ]);
    }
}

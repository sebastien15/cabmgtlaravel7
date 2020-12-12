<?php

use Illuminate\Database\Seeder;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->insert([
            'name' => 'XYLON',
            'description' => 1,
            'image' => 'adakfasdfasf',
            'seates' => 4,
            'luggage_place' => 2,
            'status' => 5,
        ]);
        DB::table('cars')->insert([
            'name' => 'WINGER',
            'description' => 1,
            'image' => 'adakfasdfasf',
            'seates' => 4,
            'luggage_place' => 2,
            'status' => 5,
        ]);
        DB::table('cars')->insert([
            'name' => 'SUMO',
            'description' => 1,
            'image' => 'adakfasdfasf',
            'seates' => 4,
            'luggage_place' => 2,
            'status' => 5,
        ]);
        DB::table('cars')->insert([
            'name' => 'INNOVA',
            'description' => 1,
            'image' => 'adakfasdfasf',
            'seates' => 4,
            'luggage_place' => 2,
            'status' => 5,
        ]);
    }
}

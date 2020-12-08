<?php

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert([
            'name' => 'Kimironko',
            'loc_postcode' => 13,
        ]);
        DB::table('locations')->insert([
            'name' => 'Kacyiru',
            'loc_postcode' => 17,
        ]);
        DB::table('locations')->insert([
            'name' => 'Kimironko',
            'loc_postcode' => 16,
        ]);
        DB::table('locations')->insert([
            'name' => 'Rwamagana',
            'loc_postcode' => 14,
        ]);
        DB::table('locations')->insert([
            'name' => 'Huye',
            'loc_postcode' => 13,
        ]);
        DB::table('locations')->insert([
            'name' => 'Gisenyi',
            'loc_postcode' => 13,
        ]);
        DB::table('locations')->insert([
            'name' => 'Nyagatare',
            'loc_postcode' => 13,
        ]);
        DB::table('locations')->insert([
            'name' => 'Rusizi',
            'loc_postcode' => 13,
        ]);
        DB::table('locations')->insert([
            'name' => 'Musanze',
            'loc_postcode' => 13,
        ]);
        DB::table('locations')->insert([
            'name' => 'Nyabugogo',
            'loc_postcode' => 13,
        ]);
    }
}

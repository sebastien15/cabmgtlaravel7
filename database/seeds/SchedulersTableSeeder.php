<?php

use Illuminate\Database\Seeder;

class SchedulersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('schedulers')->insert([
            "operator_id"=> 2,
            "operator_car"=> 3,
            "operator_company"=> "ornasol",
            "route_from"=> "kimironko",
            "route_to"=> "Kacyiru",
            "journey_date"=> "2020-12-08",
            "departure_time"=> "08:20:00",
            "arrival_time"=> "05:20:00",
            "journey_time"=> "-3hrs 0min",
            "journey_price"=> "3500",
            "message"=> null,
        ]);
        DB::table('schedulers')->insert([
            "operator_id"=> 2,
            "operator_car"=> 3,
            "operator_company"=> "ornasol",
            "route_from"=> "kacyiru",
            "route_to"=> "kimironko",
            "journey_date"=> "2020-12-09",
            "departure_time"=> "08:20:00",
            "arrival_time"=> "05:20:00",
            "journey_time"=> "-3hrs 0min",
            "journey_price"=> "3500",
            "message"=> null,
        ]);
        DB::table('schedulers')->insert([
            "operator_id"=> 2,
            "operator_car"=> 3,
            "operator_company"=> "Humbly",
            "route_from"=> "remera",
            "route_to"=> "Kacyiru",
            "journey_date"=> "2020-12-08",
            "departure_time"=> "05:20:00",
            "arrival_time"=> "08:20:00",
            "journey_time"=> "-3hrs 0min",
            "journey_price"=> "3500",
            "message"=> null,
        ]);
        DB::table('schedulers')->insert([
            "operator_id"=> 2,
            "operator_car"=> 3,
            "operator_company"=> "ornasol",
            "route_from"=> "kimironko",
            "route_to"=> "kimihurura",
            "journey_date"=> "2020-12-09",
            "departure_time"=> "10:20:00",
            "arrival_time"=> "11:20:00",
            "journey_time"=> "-3hrs 0min",
            "journey_price"=> "3500",
            "message"=> null,
        ]);
    }
}

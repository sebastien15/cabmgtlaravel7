<?php

use Illuminate\Database\Seeder;

class BookingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bookings')->insert([
            'user_id'=> 3,
            'scheduler_id'=> 1,
            'route_id'=> null,
            'car_id'=> 3,
            'loc_from'=> 'Itanaga',
            'loc_to'=> 'Kamba',
            'seat_no'=> '10',
            'price'=> 34,
            'payed'=> 0,
            'approved'=> null,
            'nbr_people'=> 1,
            'nbr_luggage'=> 1,
            'pickup_date'=> '2020-12-12',
            'pickup_time'=> '08:20:00',
            'pickup_full_add'=> null,
            'dropoff_full_add'=> null,
            'custom_message'=> null,
        ]);
        DB::table('bookings')->insert([
            'user_id'=> 3,
            'scheduler_id'=> 1,
            'route_id'=> null,
            'car_id'=> 3,
            'loc_from'=> 'Itanaga',
            'loc_to'=> 'Ziro',
            'seat_no'=> '10',
            'price'=> 34,
            'payed'=> 0,
            'approved'=> null,
            'nbr_people'=> 1,
            'nbr_luggage'=> 1,
            'pickup_date'=> '2020-12-12',
            'pickup_time'=> '08:20:00',
            'pickup_full_add'=> null,
            'dropoff_full_add'=> null,
            'custom_message'=> null,
        ]);
        DB::table('bookings')->insert([
            'user_id'=> 3,
            'scheduler_id'=> 1,
            'route_id'=> null,
            'car_id'=> 3,
            'loc_from'=> 'Itanaga',
            'loc_to'=> 'Pasighat',
            'seat_no'=> '10',
            'price'=> 34,
            'payed'=> 0,
            'approved'=> null,
            'nbr_people'=> 1,
            'nbr_luggage'=> 1,
            'pickup_date'=> '2020-12-12',
            'pickup_time'=> '08:20:00',
            'pickup_full_add'=> null,
            'dropoff_full_add'=> null,
            'custom_message'=> null,
        ]);
        DB::table('bookings')->insert([
            'user_id'=> 3,
            'scheduler_id'=> 1,
            'route_id'=> null,
            'car_id'=> 3,
            'loc_from'=> 'Itanaga',
            'loc_to'=> 'Aalo',
            'seat_no'=> '10',
            'price'=> 34,
            'payed'=> 0,
            'approved'=> null,
            'nbr_people'=> 1,
            'nbr_luggage'=> 1,
            'pickup_date'=> '2020-12-12',
            'pickup_time'=> '08:20:00',
            'pickup_full_add'=> null,
            'dropoff_full_add'=> null,
            'custom_message'=> null,
        ]);
    }
}

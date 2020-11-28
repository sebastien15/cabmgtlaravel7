<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'is_admin' => 1,
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'operator',
            'is_admin' => 2,
            'email' => 'operator@op.com',
            'password' => bcrypt('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'user2',
            'is_admin' => 0,
            'email' => 'user@user.com',
            'password' => bcrypt('password'),
        ]);
    }
}

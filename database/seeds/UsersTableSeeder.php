<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
            'role_id'   => 1,
            'fname'     => 'Mr.',
            'lname'    => 'Admin',
            'email'     => 'admin@example.com',
            'password'  => bcrypt('rootadmin'),
            'created_at'    => Carbon::today(),
            'updated_at'    => Carbon::today()
        ]);
        DB::table('users')->insert([
            'role_id'   => 2,
            'fname'     => 'Mr.',
            'lname'    => 'Customer',
            'email'     => 'customer@example.com',
            'password'  => bcrypt('rootcustomer'),
            'created_at'    => Carbon::today(),
            'updated_at'    => Carbon::today()
        ]);
    }
}

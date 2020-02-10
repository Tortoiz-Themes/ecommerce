<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name'  => 'Admin',
            'slug'  => 'admin',
            'created_at'    => Carbon::today(),
            'updated_at'    => Carbon::today()
        ]);
        DB::table('roles')->insert([
            'name'  => 'Customer',
            'slug'  => 'customer',
            'created_at'    => Carbon::today(),
            'updated_at'    => Carbon::today()
        ]);
    }
}

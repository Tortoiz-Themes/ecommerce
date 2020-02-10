<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name'  => 'Mobile',
            'slug'  => Str::slug('mobile'),
            'created_at'    => Carbon::today(),
            'updated_at'    => Carbon::today()
        ]);
        DB::table('categories')->insert([
            'name'  => 'Laptop',
            'slug'  => Str::slug('laptop'),
            'created_at'    => Carbon::today(),
            'updated_at'    => Carbon::today()
        ]);
        DB::table('categories')->insert([
            'name'  => 'Tablet',
            'slug'  => Str::slug('tablet'),
            'created_at'    => Carbon::today(),
            'updated_at'    => Carbon::today()
        ]);
        DB::table('categories')->insert([
            'name'  => 'Watch',
            'slug'  => Str::slug('watch'),
            'created_at'    => Carbon::today(),
            'updated_at'    => Carbon::today()
        ]);
    }
}

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
       DB::table('locations')->insert(['name' => 'Hà Nội']);
       DB::table('locations')->insert(['name' => 'Hồ Chí Minh']);
       DB::table('locations')->insert(['name' => 'Cần Thơ']);
       DB::table('locations')->insert(['name' => 'Hải Phòng']);
       DB::table('locations')->insert(['name' => 'Đà Nẵng']);
    }
}

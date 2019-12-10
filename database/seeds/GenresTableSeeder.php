<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert(['name'=>'Rock']);
        DB::table('genres')->insert(['name'=>'Nhạc trẻ']);
        DB::table('genres')->insert(['name'=>'Indie']);
        DB::table('genres')->insert(['name'=>'Nhạc trữ tình']);
        DB::table('genres')->insert(['name'=>'Nhạc ']);
        DB::table('genres')->insert(['name'=>'Country']);
        DB::table('genres')->insert(['name'=>'Blues']);
        DB::table('genres')->insert(['name'=>'Jazz']);
        DB::table('genres')->insert(['name'=>'Heavy metal']);
        DB::table('genres')->insert(['name'=>'R&B']);
        DB::table('genres')->insert(['name'=>'Dân gian']);
        DB::table('genres')->insert(['name'=>'A cappella']);
        DB::table('genres')->insert(['name'=>'Khác']);
    }
}

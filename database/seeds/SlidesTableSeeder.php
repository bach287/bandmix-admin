<?php

use Illuminate\Database\Seeder;

class SlidesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 3; $i++) {
            DB::table('slides')->insert([
                'url' => 'images/slides/slide'.$i.'.png',
                'status' => 1,
                'is_on_top' => 0
            ]);
        }
    }
}

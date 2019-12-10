<?php

use Illuminate\Database\Seeder;

class BandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 50; $i++) {
            \DB::table('bands')->insert([
                'name' => $faker->text(20),
                'description' => $faker->text(100),
                'doc' => $faker->dateTime(),
                'avatar' =>$faker->imageUrl($width = 640,$height=480),
                'location_id' => $faker->numberBetween(1,50),
                'about' => $faker->text(200),
                'achievements' =>  $faker->text(200),
                'status' => $faker->numberBetween(0, 1),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
                'member_id'=> $faker->numberBetween(0,15),
            ]);
        }
    }
}

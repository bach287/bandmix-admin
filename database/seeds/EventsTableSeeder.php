<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
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
            \DB::table('events')->insert([
                'name' => $faker->text(15),
                'description' => $faker->realText(40),
                'detail' => $faker->realText(500),
                'time' => $faker->dateTime(),
                'vacancy' => $faker->numberBetween(0,50),
                'price' => $faker->numberBetween(0,50),
                'member_id' => $faker->numberBetween(1,2),
                'avatar' => $faker->imageUrl(1594,1080),
                'genre_id'=> $faker->numberBetween(1,12),
                'location_id' => $faker->numberBetween(0,5),
                'mail' => $faker->email(),
                'number_phone' => $faker->numberBetween(1000000,200000000)


            ]);
        }
    }
}

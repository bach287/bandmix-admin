<?php

use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
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
            \DB::table('members')->insert([
                'name' => $faker->text(20),
                'password' => bcrypt('123456'),
                'dob' => $faker->dateTime(),
                'address' => $faker->address(),
                'avatar' =>$faker->imageUrl($width = 640,$height=480),
                'gender' => $faker->numberBetween(0, 1),
                'phone_number' => '0'.$faker->numberBetween(100000000, 999999999),
                'email' => $faker->email,
                'status' => $faker->numberBetween(0, 1),
                'created_at' => $faker->dateTime(),
                'updated_at' => $faker->dateTime(),
            ]);
        }
    }
}

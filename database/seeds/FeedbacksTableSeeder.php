<?php

use Illuminate\Database\Seeder;

class FeedbacksTableSeeder extends Seeder
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
            \DB::table('feedback')->insert([
                'guest_name' => $faker->name(),
                'email' => $faker->email(),
                'feedback_title' => $faker->title(20),
                'feedback_body' => $faker->text(100)
            ]);
        }
    }
}

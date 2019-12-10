<?php

use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
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
            $title = $faker->text(40);
            \DB::table('news')->insert([
                'title' => $title,
                'user_id' => $faker->numberBetween(1,1),
                'description' => $faker->text(100),
                'body' => $faker->realText(300),
                'status' => $faker->numberBetween(0,1),
                'is_show_home' => 0,
                'category_id' => $faker->numberBetween(0,100),
                'avatar' => $faker->imageUrl($width = 400, $height = 400),
                'slug' => str_slug($title,'-') . '-n'. $i,
                'created_at' => $faker->date('Y-m-d')
            ]);
        }
    }
}

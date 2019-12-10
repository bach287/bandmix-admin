<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
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
			\DB::table('categories')->insert([
				'name' => $faker->text(20)
			]);
		}
    }
}

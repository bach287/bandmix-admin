<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CategoryTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(MembersTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(BandsTableSeeder::class);
        $this->call(SlidesTableSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(FeedbacksTableSeeder::class);
        $this->call(GenresTableSeeder::class);
    }
}

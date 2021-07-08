<?php

namespace Database\Seeders;

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
        $this->call(CountriesTableSeeder::class);
        $this->call(AcademySizesTableSeeder::class);
        $this->call(AdsTableSeeder::class);
        $this->call(SportsTableSeeder::class);
        $this->call(ActivitiesTableSeeder::class);
        $this->call(UserSeeder::class);
    }
}

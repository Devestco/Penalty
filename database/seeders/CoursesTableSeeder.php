<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Player;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::factory()
            ->count(5)
            ->create();

    }
}

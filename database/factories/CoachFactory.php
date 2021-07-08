<?php

namespace Database\Factories;

use App\Models\Academy;
use App\Models\AcademySize;
use App\Models\Ad;
use App\Models\Coach;
use App\Models\Country;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CoachFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Coach::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sport_id' => 1,
        ];
    }
}

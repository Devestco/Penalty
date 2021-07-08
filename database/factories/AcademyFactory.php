<?php

namespace Database\Factories;

use App\Models\Academy;
use App\Models\AcademySize;
use App\Models\Ad;
use Illuminate\Database\Eloquent\Factories\Factory;

class AcademyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Academy::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $ads = Ad::pluck('id')->toArray();
        $academy_sizes=AcademySize::pluck('id')->toArray();
        return [
            'ad_id' => $this->faker->randomElement($ads),
            'country_id' => 2,
            'city' => $this->faker->city,
            'academy_size_id' => $this->faker->randomElement($academy_sizes),
        ];
    }
}

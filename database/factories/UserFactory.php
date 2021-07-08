<?php

namespace Database\Factories;

use App\Http\Enums\UserRole;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'phone' => '05'.rand(11111111,99999999),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'last_ip'=>$this->faker->localIpv4,
            'created_at'=>Carbon::now()->subMonths(rand(1,12)),
            'last_login_at'=>Carbon::now()->subDays(rand(1,12))
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    public function configure()
    {
        return $this->afterMaking(function (User $user) {
//            $user->assignRole(UserRole::of(UserRole::ROLE_ACADEMY));
        })->afterCreating(function (User $user) {
            if ($user->type=='ACADEMY'){
                $user->assignRole(UserRole::of(UserRole::ROLE_ACADEMY));
            }elseif ($user->type=='COACH'){
                $user->assignRole(UserRole::of(UserRole::ROLE_COACH));
            }elseif ($user->type=='PLAYER'){
                $user->assignRole(UserRole::of(UserRole::ROLE_PLAYER));
            }
        });
    }
}

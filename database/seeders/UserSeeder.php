<?php

namespace Database\Seeders;

use App\Http\Enums\UserRole;
use App\Models\Academy;
use App\Models\Coach;
use App\Models\Course;
use App\Models\CourseDay;
use App\Models\Group;
use App\Models\Player;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Sequence;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createRoles();
        $this->createSuperAdmin();
       // $this->createAcademy();
//        $this->createCoach();
//        $this->createPlayer();
    }
    private function createRoles()
    {
        foreach (UserRole::ROLES as $id => $roleEnum) {
             Role::findOrCreate($roleEnum);
        }
    }
    private function createSuperAdmin()
    {
        $user = User::create([
            'type' => 'ADMIN',
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'phone' => '0512345622',
            'password' => "secret",
            'remember_token' => Str::random(10),
        ]);
        $user->assignRole(UserRole::of(UserRole::ROLE_SUPER_ADMIN));
        $user->assignRole(UserRole::of(UserRole::ROLE_ADMIN));
    }
    private function createAcademy()
    {
        User::factory()->count(15)->state(new Sequence(function ($sequence) {return ['type' => 'ACADEMY', 'name' => 'ACADEMY '.$sequence->index,];},))
            ->has(Academy::factory()->count(1)->state(function (array $attributes, User $user) {return ['created_at' => $user->created_at];})
                  //  ->has(Course::factory()->count(rand(2,9))->state(function (array $attributes, Academy $academy) {return ['created_at' => Carbon::parse($academy->created_at)->addDays(rand(1,120))];}))
                  //  ->has(Group::factory()->count(rand(2,9))->state(function (array $attributes, Academy $academy) {return ['created_at' => Carbon::parse($academy->created_at)->addDays(rand(1,120))];}))
            )
            ->create();
    }
    private function createCoach()
    {
        User::factory()
            ->count(40)
            ->state(new Sequence(
                function ($sequence) {
                    return [
                        'type' => 'COACH',
                        'name' => 'COACH '.$sequence->index,
                    ];
                },
            ))
            ->has(
                Coach::factory()
                    ->count(1)
                    ->state(function (array $attributes, User $user) {
                        return [
                            'created_at' => $user->created_at
                        ];
                    })
            )
            ->create();
    }
    private function createPlayer()
    {
        User::factory()
            ->count(250)
            ->state(new Sequence(
                function ($sequence) {
                    return [
                        'type' => 'PLAYER',
                        'name' => 'PLAYER '.$sequence->index,
                    ];
                },
            ))
            ->has(
                Player::factory()
                    ->count(1)
                    ->state(function (array $attributes, User $user) {
                        return [
                            'created_at' => $user->created_at
                        ];
                    })
            )
            ->create();
    }
}

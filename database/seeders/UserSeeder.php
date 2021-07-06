<?php

namespace Database\Seeders;

use App\Http\Enums\UserRole;
use App\Models\Academy;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

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
        $this->createAcademy();
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
            'phone' => '0500000000',
            'password' => "secret",
            'remember_token' => Str::random(10),
        ]);
        $user->assignRole(UserRole::of(UserRole::ROLE_SUPER_ADMIN));
        $user->assignRole(UserRole::of(UserRole::ROLE_ADMIN));
    }
    private function createAcademy()
    {
        $user = User::create([
            'type' => 'ACADEMY',
            'name' => 'academy 1',
            'email' => 'academy_1@gmail.com',
            'phone' => '0500000000',
            'password' => "secret",
            'remember_token' => Str::random(10),
        ]);
        $user->assignRole(UserRole::of(UserRole::ROLE_ACADEMY));
        Academy::create([
           'user_id'=>$user->id,
           'ad_id'=>1,
           'country_id'=>2,
           'city'=>'al-ryad',
           'academy_size_id'=>2
        ]);
        $user = User::create([
            'type' => 'ACADEMY',
            'name' => 'academy 2',
            'email' => 'academy_2@gmail.com',
            'phone' => '0500000011',
            'password' => "secret",
            'remember_token' => Str::random(10),
        ]);
        $user->assignRole(UserRole::of(UserRole::ROLE_ACADEMY));
        Academy::create([
           'user_id'=>$user->id,
           'ad_id'=>2,
           'country_id'=>2,
           'city'=>'gda',
           'academy_size_id'=>3
        ]);
        $user = User::create([
            'type' => 'ACADEMY',
            'name' => 'academy 3',
            'email' => 'academy_3@gmail.com',
            'phone' => '0500000022',
            'password' => "secret",
            'remember_token' => Str::random(10),
        ]);
        $user->assignRole(UserRole::of(UserRole::ROLE_ACADEMY));
        Academy::create([
           'user_id'=>$user->id,
           'ad_id'=>3,
           'country_id'=>2,
           'city'=>'gda',
           'academy_size_id'=>4
        ]);
    }
}

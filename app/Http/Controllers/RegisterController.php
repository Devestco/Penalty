<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Enums\UserRole;
use App\Http\Requests\Dashboard\AcademyStoreRequest;
use App\Models\Academy;
use App\Models\AcademySize;
use App\Models\Ad;
use App\Models\Coach;
use App\Models\Contestant;
use App\Models\Country;
use App\Models\Sport;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    protected $redirectTo = '/';

    use AuthenticatesUsers;

    public function showRegisterForm()
    {
        $countries = Country::all();
        $ads = Ad::all();
        $academy_sizes = AcademySize::all();
        $sports = Sport::all();
        return view('auth.register', compact('countries', 'ads', 'academy_sizes', 'sports'));
    }

    public function showPlayerRegisterForm()
    {
        return view('auth.player-register');
    }


    public function contestantRegister(Request $request)
    {
        $data = $request->all();
        $data['ip']=$request->ip();
        Contestant::create($data);
        return redirect()
            ->route('landing')
            ->with('status','يرجي انتظار مراجعة الادارة لبياناتك');
    }
    public function register(AcademyStoreRequest $request)
    {
        $data = $request->validated();
        $data['type'] = 'ACADEMY';
        $user = User::create($data);
        $user->assignRole(UserRole::of(UserRole::ROLE_ACADEMY));
        $data['user_id'] = $user->id;
        $data['location'] = [
            'lat' => $request['lat'],
            'lng' => $request['lng'],
        ];
        $data['status']='pending';
        $academy = Academy::create($data);
        if ($request['academy_size_id'] == 1) {
            $data['academy_id'] = $academy->id;
            Coach::create($data);
        }
        return redirect()
            ->route('landing')
            ->with('status','يرجي انتظار مراجعة الادارة لبياناتك');
    }

}

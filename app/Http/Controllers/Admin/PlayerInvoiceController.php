<?php

namespace App\Http\Controllers\Admin;

use App\Http\Enums\UserRole;
use App\Http\Requests\Dashboard\PlayerStoreRequest;
use App\Models\Academy;
use App\Models\Ad;
use App\Models\Coach;
use App\Models\Course;
use App\Models\Group;
use App\Models\Player;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayerInvoiceController extends MasterController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $groups_players=DB::table('group_player')->pluck('player_id')->toArray();
        $courses_players=DB::table('course_player')->where('payed',false)->pluck('player_id')->toArray();
        $players=array_merge($courses_players,$groups_players);
        $rows = Player::whereIn('id',$players)->latest()->get();
        return view('player-invoice.index', compact('rows'));
    }

    public function create()
    {
        $ads = Ad::all();
        $academies = Academy::all();
        return view('player.create', compact('academies','ads'));
    }

    public function store(PlayerStoreRequest $request)
    {
        $data = $request->all();
        $data['type'] = 'PLAYER';
        $user = User::create($data);
        $user->assignRole(UserRole::of(UserRole::ROLE_PLAYER));
        $data['user_id'] = $user->id;
        $data['birth_date']=Carbon::parse($request['birth_date']);
        Player::create($data);
        return redirect()->route('admin.player.index')->with('created');
    }

    public function show($id): object
    {
        $row = Player::find($id);
        return view('player.show', compact('row'));
    }

    public function edit($id): object
    {
        $ads = Ad::all();
        $row = Player::find($id);
        return view('player.edit', compact('row', 'ads'));
    }

    public function update($id, Request $request)
    {
        $row = Player::find($id);
        $data = $request->all();
        $row->update($data);
        $row->user->update($data);
        return redirect()->route('admin.player.index')->with('updated');
    }
}

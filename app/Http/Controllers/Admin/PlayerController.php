<?php

namespace App\Http\Controllers\Admin;

use App\Http\Enums\UserRole;
use App\Http\Requests\Dashboard\PlayerStoreRequest;
use App\Models\Ad;
use App\Models\Player;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PlayerController extends MasterController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $rows = Player::latest()->get();
        return view('player.index', compact('rows'));
    }

    public function create()
    {
        $ads = Ad::all();
        return view('player.create', compact('ads'));
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

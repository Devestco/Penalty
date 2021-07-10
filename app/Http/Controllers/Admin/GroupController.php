<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Dashboard\GroupStoreRequest;
use App\Models\Academy;
use App\Models\Group;
use App\Models\GroupDay;
use App\Models\Sport;
use Illuminate\Http\Request;

class GroupController extends MasterController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $rows = Group::latest()->get();
        return view('group.index', compact('rows'));
    }

    public function create()
    {
        $sports = Sport::all();
        $academies = Academy::all();
        return view('group.create', compact('academies', 'sports'));
    }

    public function store(GroupStoreRequest $request)
    {
        $data = $request->all();
        $group = Group::create($data);
        $days = $request['days'];
        foreach ($days as $day) {
            GroupDay::create([
                'group_id' => $group->id,
                'name' => $day,
                'start_time' => $request['start_time'],
                'duration' => $request['duration'],
                'activity_id' => $request['activity_id'],
                'comment' => $request['comment'],
            ]);
        }
        return redirect()->route('admin.group.index')->with('created');
    }

    public function show($id): object
    {
        $row = Group::find($id);
        return view('group.show', compact('row'));
    }

    public function edit($id): object
    {
        $sports = Sport::all();
        $academies = Academy::all();
        $row = Group::find($id);
        return view('group.edit', compact('row', 'sports', 'academies'));
    }

    public function update($id, Request $request)
    {
        $group = Group::find($id);
        $data = $request->all();
        $group->update($data);
        return redirect()->route('admin.group.index')->with('updated');
    }
}


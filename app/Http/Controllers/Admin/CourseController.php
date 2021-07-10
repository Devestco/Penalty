<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Dashboard\GroupStoreRequest;
use App\Models\Academy;
use App\Models\Course;
use App\Models\CourseDay;
use App\Models\Sport;
use Illuminate\Http\Request;

class CourseController extends MasterController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $rows = Course::latest()->get();
        return view('course.index', compact('rows'));
    }

    public function create()
    {
        $sports = Sport::all();
        $academies = Academy::all();
        return view('course.create', compact('academies', 'sports'));
    }

    public function store(GroupStoreRequest $request)
    {
        $data = $request->all();
        $course = Course::create($data);
        $days = $request['days'];
        foreach ($days as $day) {
            CourseDay::create([
                'course_id' => $course->id,
                'name' => $day,
                'start_time' => $request['start_time'],
                'duration' => $request['duration'],
                'activity_id' => $request['activity_id'],
                'comment' => $request['comment'],
            ]);
        }
        return redirect()->route('admin.course.index')->with('created');
    }

    public function show($id): object
    {
        $row = Course::find($id);
        return view('course.show', compact('row'));
    }

    public function edit($id): object
    {
        $sports = Sport::all();
        $academies = Academy::all();
        $row = Course::find($id);
        return view('course.edit', compact('row', 'sports', 'academies'));
    }

    public function update($id, Request $request)
    {
        $course = Course::find($id);
        $data = $request->all();
        $course->update($data);
        return redirect()->route('admin.course.index')->with('updated');
    }
}


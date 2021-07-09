<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sport;

class SportController extends MasterController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $rows = Sport::latest()->get();
        return view('sport.index', compact('rows'));
    }
}

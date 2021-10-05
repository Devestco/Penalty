<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contestant;

class ContestantController extends MasterController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $rows = Contestant::latest()->get();
        return view('contestant.index', compact('rows'));
    }
}

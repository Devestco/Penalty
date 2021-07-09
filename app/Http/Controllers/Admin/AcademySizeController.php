<?php

namespace App\Http\Controllers\Admin;

use App\Models\AcademySize;

class AcademySizeController extends MasterController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $rows = AcademySize::latest()->get();
        return view('academy_size.index', compact('rows'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Ad;

class AdController extends MasterController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $rows = Ad::latest()->get();
        return view('ad.index', compact('rows'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\Country;

class CountryController extends MasterController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $rows = Country::latest()->get();
        return view('country.index', compact('rows'));
    }
}

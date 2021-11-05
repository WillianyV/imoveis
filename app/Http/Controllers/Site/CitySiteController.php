<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CitySiteController extends Controller
{
    public function index()
    {
        $lits_of_cities = City::orderBy('name')->get();

        return view('site.cities.index',compact('lits_of_cities'));
    }
}

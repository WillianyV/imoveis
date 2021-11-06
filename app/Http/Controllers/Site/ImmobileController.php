<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Immobile;
use Illuminate\Http\Request;

class ImmobileController extends Controller
{
    public function index($city_id)
    {
        $city = City::find($city_id);
        $immobile = Immobile::with([]);
        return view('site.cities.immobile.index',compact('city'));
    }

    public function show()
    {
        
    }
}

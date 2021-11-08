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
        $immobiles = Immobile::with(['goal','photo'])
            ->where('city_id',$city_id)
            ->paginate(3);
        return view('site.cities.immobile.index',compact('city','immobiles'));
    }

    public function show($city_id,$immobile_id)
    {
        $immobile = Immobile::find($immobile_id);
        return view('site.cities.immobile.show',compact('immobile'));    
    }
}

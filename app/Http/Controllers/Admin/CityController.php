<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCityRequest;
use App\Http\Requests\UpdateCityRequest;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $sub_title = 'Cidades';
        $list_of_citys = City::all();
        
        return view('admin.city.index', compact('sub_title','list_of_citys'));
    }

    public function create()
    {
        $action = route('city.store');
        return view('admin.city.create',compact('action'));
    }

    public function store(StoreCityRequest $request)
    {
        City::create($request->all());

        $request->session()->flash('menssage', "Cidade $request->name cadastrada com sucesso.");

        return redirect()->route('city.index');
    }

    public function edit(City $city)
    {
        $action = route('city.update', $city->id);
        return view('admin.city.edit', compact('city','action')); 
    }

    public function update(UpdateCityRequest $request, City $city)
    {
        $city->update($request->all());
        $request->session()->flash('menssage', "Cidade $request->name editada com sucesso.");
        return redirect()->route('city.index');
    }

    public function destroy(City $city, Request $request)
    {
        $city->delete();
        $request->session()->flash('menssage', "Cidade excluída com sucesso.");
        return redirect()->route('city.index');
    }
}

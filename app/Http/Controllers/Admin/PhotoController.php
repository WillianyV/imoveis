<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Immobile;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $immobile = Immobile::find($id);
        
        $photos = Photo::where('immobile_id', $id)->get();

        return view('admin.immobile.photos.index',compact('immobile','photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $immobile = Immobile::find($id);
        return view('admin.immobile.photos.form',compact('immobile'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //checar se veio a imagem na requisição
        if($request->hasFile('photo')){
            //checar se não houve erro no upload da imagem
            if($request->photo->isValid()){
                $path = $request->photo->store('images', 'public');
            }
        }

        dd($path);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

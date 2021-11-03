<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Immobile;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

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
    public function store(Request $request, $immobile_id)
    {
        //checar se veio a imagem na requisição
        if($request->hasFile('photo')){
            //checar se não houve erro no upload da imagem
            if($request->photo->isValid()){   
                /**
                 * //não da certo dessa forma
                 * //pegando o caminho e nome do arquivo
                 * $path = $request->photo->hashName("immobile/$immobile_id");
                 * //redimencionar a imagem
                 * $img = Image::make($request->photo)->fit(1600,900);
                 * //Salvar no disco
                 * Storage::disk('public')->put($path,$img->encode());               
                 * // armazenando o caminho da foto
                 * $photo = new Photo();
                 * $photo->url = $path;
                 * $photo->immobile_id = $immobile_id;
                 * $photo->save();
                 */

                //armazenando o arquivo no disco publico e retornando a url (caminho) do arquivo
                $extension = $request->photo->extension();
                $imageName = md5(strtotime("now") . $request->photo->getClientOriginalName()) . "." . $extension;
                $request->photo->move(public_path("storage/immobile/$immobile_id"),$imageName);
                //aramazenando o caminho da foto
                $photo = new Photo();
                $photo->url = "immobile/$immobile_id/$imageName";
                $photo->immobile_id = $immobile_id;
                $photo->save();
            }
        }   
        $request->session()->flash('Sucesso','Foto incluida com sucesso!'); 
        return redirect()->route('immobile.photos.index',$immobile_id);
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

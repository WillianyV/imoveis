<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Goal;
use App\Models\Immobile;
use App\Models\Proximity;
use App\Models\Type;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ImmobileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sub_title = 'Imóveis';
        $list_of_immobiles = Immobile::all();
        
        return view('admin.immobile.index', compact('sub_title','list_of_immobiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $list_of_cities = City::all();
        $list_of_goals = Goal::all();
        $list_of_types = Type::all();
        $list_of_proximitys = Proximity::all();
        $action = route('immobile.store');
        return view('admin.immobile.create',compact('action','list_of_cities','list_of_goals','list_of_types','list_of_proximitys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        try {
            //uma transação é uma sequência de operações num sgbd que são tratadas como um bloco único 
            //Como essas duas imoveis e endereco depende uma da outra é nescessario fazer uma transação
            //pois se houver qualquer erro no bloco, ele faz um roollback completo
            DB::beginTransaction();
                //Criar um imovel (e pegar as informações $immobile) que será utilizada para criar o endereco
                $immobile = Immobile::create($request->all());
                //relacionamento 1 - 1
                //pega o id que foi criado e cria um endereco
                $immobile->address()->create($request->all());

                if($request->has('proximity')){
                    //relacionamento N - N
                    // ele vavi pegar 1 id ou um array de id's e sincronizar o imovel com os aproximidade
                    $immobile->proximity()->sync($request->proximity);
                }
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }

        //enviar msg flash
        $request->session()->flash('menssage', "Imovel cadastrado com sucesso.");

        return redirect()->route('immobile.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $list_of_cities = City::all();
        $list_of_goals = Goal::all();
        $list_of_types = Type::all();
        $list_of_proximitys = Proximity::all();
        $action = route('immobile.update');
        return view('admin.immobile.edit',compact('action','list_of_cities','list_of_goals','list_of_types','list_of_proximitys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

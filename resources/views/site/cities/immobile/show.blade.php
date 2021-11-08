@extends('site.layouts.app')
@section('content') 
    <section class="section">
        <div class="row">
            <div class="col s12">
                <h4>{{ $immobile->title }}</h4> 
            </div>
        </div>
        {{--  --}}
        <div class="row">
            <div class="col">Cidade: </div>
            <div class="col"><b>{{ $immobile->city->name }}</b></div>
        </div>
        {{--  --}}
        <div class="row">
            <div class="col">Pontos de referências: </div>
            <div class="col">
                <b>
                    @foreach ($immobile->proximity as $proximity)
                        <span>{{ $proximity->name }};</span>
                    @endforeach
                </b>
            </div>
        </div>
        {{--  --}}
        <div class="row">
            <div class="col s4">
                <div class="row">
                    <div class="col">Rua: </div>
                    <div class="col"><b>{{ $immobile->address->street }};</b></div>
                </div>            
            </div>
            <div class="col s4">
                <div class="row">
                    <div class="col">Número: </div>
                    <div class="col"><b>{{ $immobile->address->house_number }}</b></div>
                </div>            
            </div>
            <div class="col s4">
                <div class="row">
                    <div class="col">Complemento: </div>
                    <div class="col"><b>{{ $immobile->address->complement }}</b></div>
                </div>            
            </div>
        </div>
        {{--  --}}
        <div class="row">
            <div class="col s4">
                <div class="row">
                    <div class="col">Bairro: </div>
                    <div class="col"><b>{{ $immobile->address->district }}</b></div>
                </div>            
            </div>
            <div class="col s4">
                <div class="row">
                    <div class="col">Tipo: </div>
                    <div class="col"><b>{{ $immobile->type->name }}</b></div>
                </div>            
            </div>
            <div class="col s4">
                <div class="row">
                    <div class="col">Finalidade: </div>
                    <div class="col"><b>{{ $immobile->goal->name }}</b></div>
                </div>            
            </div>
        </div>
        {{--  --}} 
        <div class="row">
            <div class="col s4">
                <div class="row">
                    <div class="col">Valor: </div>
                    <div class="col"><b>{{ $immobile->price }}</b></div>
                </div>            
            </div>
            <div class="col s4">
                <div class="row">
                    <div class="col">Total de quartos: </div>
                    <div class="col"><b>{{ $immobile->room }}</b></div>
                </div>            
            </div>
            <div class="col s4">
                <div class="row">
                    <div class="col">Total de salas: </div>
                    <div class="col"><b>{{ $immobile->living_room }}</b></div>
                </div>            
            </div>
        </div>
        {{--  --}}
        <div class="row">
            <div class="col s4">
                <div class="row">
                    <div class="col">Terreno em m²: </div>
                    <div class="col"><b>{{ $immobile->ground }}</b></div>
                </div>            
            </div>
            <div class="col s4">
                <div class="row">
                    <div class="col">Total de banheiros: </div>
                    <div class="col"><b>{{ $immobile->bathroom }}</b></div>
                </div>            
            </div>
            <div class="col s4">
                <div class="row">
                    <div class="col">Total de garagens: </div>
                    <div class="col"><b>{{ $immobile->garage }}</b></div>
                </div>            
            </div>
        </div>
        {{--  --}}
        <div class="row">
            <div class="col">Descrição: </div>
            <div class="col"><b>{{  $immobile->descrytion }}</b></div>
        </div>

        {{-- imagens do imovel --}}
        <h4 class="center">
            <span class="teal-text">Imagens</span> do Imóvel
        </h4>
        <div style="display:flex; flex-wrap:wrap; justify-content; space-around">
            @foreach ($immobile->photo as $photo)
                <img style="margin: 5px;" width="195" heigth="130" 
                class="materialboxed" src="{{ asset("storage/{$photo->url}") }}"/>
            @endforeach
        </div>

        {{-- btn voltar --}}
        <div class="right-align">
            <a href="{{ url()->previous() }}" class="btn-flat waves-effect">Voltar</a>
        </div>
        {{--   btn-flat waves-effect --}}        
    </section>
@endsection
@extends('site.layouts.app')
@section('content') 
    <section class="section lighten-4 center">
        <div class="div-section">
            @foreach ($lits_of_cities as $city)
                <a href="{{ route('cities.immobile.index',$city->id) }}">                    
                    <div class="card-panel card-style">
                        <i class="material-icons medium green-text text-lighten-3">room</i>
                        <h5 class="black-text">{{ $city->name }}</h5>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection
{{-- não está pegando o carrosel --}}
@section('slider')
    <section>        
        <div class="slider">
            <ul class="slides">
                <li>
                    <img src="https://source.unsplash.com/TiVPTYCG_3E/1900x600" />
                    <div class="caption center-align">
                        <h2 >Encotre os melhores imóveis da cidade!</h2>
                    </div>
                </li>                
                <li>                    
                    <img src="https://source.unsplash.com/1ddol8rgUH8/1900x600" />
                    <div class="caption left-align">
                        <h2 class="slider-text">Melhores imóveis para aluguel!</h2>
                    </div>
                </li>
                <li>
                    <img src="https://source.unsplash.com/b_79nOqf95I/1900x600" />
                    <div class="caption rigth-align">
                        <h2 class="slider-text">Melhores imóveis para venda!</h2>
                    </div>
                </li>
                <li>
                    <img src="https://source.unsplash.com/178j8tJrNlc/1900x600" />
                    <div class="caption left-align">
                        <h2 class="slider-text">Logo</h2>
                    </div>
                </li>
            </ul>
        </div>
    </section>
@endsection
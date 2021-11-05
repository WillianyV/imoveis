@extends('site.layouts.app')

@section('content') 
    <section class="section lighten-4 center">
        <div class="div-section">
            @foreach ($lits_of_cities as $city)
                <a href="#">                    
                    <div class="card-panel card-style">
                        <i class="material-icons medium green-text text-lighten-3">room</i>
                        <h5 class="black-text">{{ $city->name }}</h5>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
@endsection

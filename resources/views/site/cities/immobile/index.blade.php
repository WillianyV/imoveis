@extends('site.layouts.app')
@section('content') 
    <h3>Imóveis disponíveis em {{ $city->name }}</h3>
    <div class="divider"></div>
    <div style="display: flex;flex-wrap: wrap;">
        @forelse ($immobiles as $immobile)
            <div class="card" style="width: 250px; margin: 10px;">
                <div class="card-image">
                    @if (count($immobile->photo) > 0)
                        <img src="{{ asset("storage/{$immobile->photo[0]->url}") }}">                   
                    @endif
                </div>
                <div class="card-content">
                    <p class="card-title">
                        {{ $immobile->title }}
                    </p>
                    <p>
                        Finalidade: <strong>{{ $immobile->goal->name }}</strong>
                    </p>
                    <p>
                        Preço: <strong>R$ {{ $immobile->price }}</strong>
                    </p>
                </div> 
                <div class="card-action">
                    <a href="{{ route('cities.immobile.show',[$city->id,$immobile->id]) }}" class="green-text">
                        Ver detalhes
                    </a>
                </div>
            </div>
        @empty
            <p>Não existem imóveis disponíveis nessa cidade no momento!</p>            
        @endforelse
    </div>
    <div class="center">
        {{ $immobiles->links('shared.pagination') }}
    </div>
@endsection
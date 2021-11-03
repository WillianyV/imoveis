@extends('admin.layouts.app')

@section('content')    
   <h4>{{ $immobile->title }}</h4> 
   <section class="section">

      <div class="flex-container">
         @forelse ($photos as $photo)
            <div class="flex-item">
               <img src="{{ asset("storage/$photo->url") }}" width="150" height="100">               
            </div>
         @empty
            <div>Não existem fotos para esse imóvel</div>
         @endforelse
      </div>
      <div class="fixed-action-btn">
         <a href="{{ route('immobile.photos.create',$immobile->id) }}" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
      </div>
      
   </section>
@endsection
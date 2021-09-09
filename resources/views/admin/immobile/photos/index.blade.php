@extends('admin.layouts.app')

@section('content')    
   <h4>{{ $immobile->title }}</h4> 
   <section class="section">
      @forelse ($photos as $photo)
          <div>{{ $photo->url }}</div>
      @empty
          <div>Não existem fotos para esse imóvel</div>
      @endforelse

      <div class="fixed-action-btn">
         <a href="{{ route('immobile.photos.create',$immobile->id) }}" class="btn-floating btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>
      </div>
      
   </section>
@endsection
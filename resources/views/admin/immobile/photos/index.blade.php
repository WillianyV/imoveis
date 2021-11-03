@extends('admin.layouts.app')

@section('content')    
   <h4>{{ $immobile->title }}</h4> 
   <section class="section">

      <div class="flex-container">
         @forelse ($photos as $photo)
            <div class="flex-item">
               <span class="btn-fechar">
                  <form action="{{ route('immobile.photos.destroy',[$immobile->id,$photo->id]) }}" method="POST" style="display: inline">
                     @csrf
                     @method('DELETE')
                     <button type="submit" style="border: 0; background:transparent;" title="Excluir">
                        <span style="cursor: pointer"> <i class="material-icons red-text text-accent-3">delete_forever</i> </span>
                     </button>
                  </form>                       
               </span>
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
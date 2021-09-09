@extends('admin.layouts.app')

@section('content')    
   <section class="section">
        <form action="{{ route('immobile.photos.store',$immobile->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="file-field input-field">
                <div class="btn">
                    <span>Selecionar Fotos</span>
                    <input type="file" name="photo">
                </div>
                <div class="file-path-wrapper">
                    <input type="text" class="file-path validate">
                </div>                
            </div>
            <div class="right-align">
                <a href="{{ url()->previous() }}" class="btn-flat waves-effect">Cancelar</a>
                <button type="submit" class="btn waves-effect waves-light">Salvar</button>
            </div>{{-- end buttons --}}
        </form>
   </section>
@endsection
@extends('admin.layouts.app')

@section('content') 
    <section class="section">   
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large waves-effect waves-light red" href="{{ route('immobile.create') }}">
                <i class="material-icons">add</i>
            </a>
        </div>
    </section>
@endsection
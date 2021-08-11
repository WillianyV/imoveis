@extends('admin.layouts.app')

@section('content')    
    <section class="section">
        <form action="{{ route('city.store') }}" method="POST">
            @include('admin.city._partials.form')
        </form>
    </section>
@endsection
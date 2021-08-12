@extends('admin.layouts.app')

@section('content')    
    <section class="section">       
        <h3>{{ $sub_title }}</h3>
        <table class="highlight responsive-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cidades</th>
                    <th class="right-align">Opções</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($list_of_citys as $city)
                    <tr>
                        <td>#{{ $city->id }}</td>
                        <td>{{ $city->name }}</td>
                        <td class="right-align">
                            <a href="{{ route('city.edit',$city->id) }}">
                                <span> <i class="material-icons blue-text text-accent-2">edit</i> </span>
                            </a>
                            <form action="{{ route('city.destroy',$city->id) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="border: 0; background:transparent;">
                                    <span style="cursor: pointer"> <i class="material-icons red-text text-accent-3">delete_forever</i> </span>
                                </button>
                            </form>                            
                        </td>
                    </tr>
                @empty
                    <tr>
                        {{-- colspan="3" : coluna que ocupa duas posições --}}
                        <td colspan="3">Não há cidades cadastradas</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large waves-effect waves-light red" href="{{ route('city.create') }}">
                <i class="material-icons">add</i>
            </a>
        </div>
        
    </section>  
@endsection

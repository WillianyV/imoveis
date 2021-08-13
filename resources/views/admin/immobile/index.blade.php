@extends('admin.layouts.app')

@section('content') 
    <section class="section"> 
        <h3>{{ $sub_title }}</h3>
        <table class="highlight responsive-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Cidades</th>
                    <th>Bairro</th>
                    <th>Título</th>
                    <th class="right-align">Opções</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($list_of_immobiles as $immobile)
                    <tr>
                        <td>#{{ $immobile->id }}</td>
                        <td>{{ $immobile->city->name }}</td>
                        <td>{{ $immobile->address->district }}</td>
                        <td>{{ $immobile->title }}</td>
                        <td class="right-align">
                            <a href="{{ route('immobile.show',$immobile->id) }}" title="Ver">
                                <span> <i class="material-icons indigo-text text-darken-2">remove_red_eye</i> </span>
                            </a>
                            <a href="{{ route('immobile.edit',$immobile->id) }}" title="Editar">
                                <span> <i class="material-icons blue-text text-accent-2">edit</i> </span>
                            </a>
                            <form action="{{ route('immobile.destroy',$immobile->id) }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="border: 0; background:transparent;" title="Excluir">
                                    <span style="cursor: pointer"> <i class="material-icons red-text text-accent-3">delete_forever</i> </span>
                                </button>
                            </form>                            
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Não existe imoveis cadastradas</td>
                    </tr>
                @endforelse
            </tbody>
        </table>  
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large waves-effect waves-light red" href="{{ route('immobile.create') }}">
                <i class="material-icons">add</i>
            </a>
        </div>
    </section>
@endsection
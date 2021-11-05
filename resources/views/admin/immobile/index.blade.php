@extends('admin.layouts.app')

@section('content') 
{{-- Filtro de pesquisa --}}
<section class="section">
    <form action="{{ route('immobile.index') }}" method="get">
        <div class="row valign-wrapper">
            <div class="input-field col s6">
                <select name="city_id" id="city">
                    <option value="">Selecione uma cidade</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}" {{ old('city_id', $filters['city_id'] ?? '') == $city->id ? 'selected' : ''}}>{{ $city->name }}</option> 
                    @endforeach
                </select>
            </div>
            <div class="input-field col s6">
                <input type="text" name="title" id="title" value="{{ $filters['title'] ?? '' }}">
                <label for="title">Título</label>
            </div>
        </div>
        <div class="row right-align">
            <a href="{{ route('immobile.index') }}" class="btn-flat waves-effect">EXIBIR TODOS</a>
            <button type="submit" class="btn waves-effect eaves-light">
                Pesquisar
            </button>
        </div>
    </form>
</section>
<hr />
{{-- Lista de imoveis --}}
    <section class="section"> 
        <h3>{{ $sub_title }}</h3>
        <table class="highlight responsive-table">
            <thead>
                <tr>
                    <th>Cidades</th>
                    <th>Bairro</th>
                    <th>Título</th>
                    <th class="right-align">Opções</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($list_of_immobiles as $immobile)
                    <tr>
                        <td>{{ $immobile->city->name }}</td>
                        <td>{{ $immobile->address->district }}</td>
                        <td>{{ $immobile->title }}</td>
                        <td class="right-align">
                            <a href="{{ route('immobile.photos.index',$immobile->id) }}" title="Fotos">
                                <span> <i class="material-icons green-text text-lighten-1">insert_photo</i> </span>
                            </a>
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
                        <td colspan="5">Não existe imóveis cadastradas ou imóveis que atendam aos critérios de pesquisa.</td>
                    </tr>
                @endforelse
            </tbody>
        </table> 
        <div class="center">
            {{ $list_of_immobiles->links('shared.pagination') }}
        </div> 
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large waves-effect waves-light red" href="{{ route('immobile.create') }}">
                <i class="material-icons">add</i>
            </a>
        </div>
    </section>
@endsection
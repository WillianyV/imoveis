<section class="section">
    <form action="{{ $action }}" method="POST">
        @isset($immobile)
            @method('PUT')
        @endisset

        @csrf
        {{-- title --}}
        <div class="row">
            <div class="input-field col s12">
                <input type="text" id="title" name="title" value="{{ old('title', $immobile->title ?? '') }}">
                <label for="title">Titulo</label>
                @error('title')
                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                @enderror
            </div>
        </div>{{-- end title --}}  
        {{-- city_id --}}   
        <div class="row">
            <div class="input-field col s12">
                <select name="city_id" id="city_id">
                    <option value="" disabled selected>Selecione uma Cidade</option>
                    @foreach ($list_of_cities as $city)
                        <option value="{{ $city->id }}" {{ old('city_id', $immobile->city->id ?? '') == $city->id ? 'selected' : ''}} >{{ $city->name }}</option>
                    @endforeach
                </select>
                <label for="city_id">Cidade</label>
                @error('city_id')
                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                @enderror
            </div>
        </div>{{-- end city_id --}}
        {{-- ADDRESS --}}
        <div class="row">
            <div class="input-field col s5">
                <input type="text" name="street" id="street" value="{{ old('street', $immobile->address->street ?? '') }}">
                <label for="street">Rua</label>
                @error('street')
                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                @enderror
            </div>
            <div class="input-field col s2">
                <input type="number" name="house_number" id="house_number" value="{{ old('house_number', $immobile->address->house_number ?? '') }}">
                <label for="house_number">Número</label>
                @error('house_number')
                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                @enderror
            </div>
            <div class="input-field col s2">
                <input type="text" name="complement" id="complement" value="{{ old('complement', $immobile->address->complement ?? '') }}">
                <label for="complement">Complemento</label>
                @error('complement')
                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                @enderror
            </div>
            <div class="input-field col s3">
                <input type="text" name="district" id="district" value="{{ old('district', $immobile->address->district ?? '') }}">
                <label for="district">Bairro</label>
                @error('district')
                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                @enderror
            </div>            
        </div>
        {{-- END ADDRESS --}}
        {{-- Proximity --}}
        <div class="row">            
            <div class="input-field col s12">
                <select multiple name="proximity[]" id="proximity">
                    <option value="" disabled>Selecione os pontos de interesse nas aproximidades</option>
                    @foreach ($list_of_proximitys as $proximity)
                        <option value="{{ $proximity->id }}" 
                            {{-- se existir um old priximidades --}}
                            @if(old('proximity'))
                            {{-- pegue o array --}}
                                {{ in_array($proximity->id,old('proximity')) ? 'selected' : '' }} 
                            @else
                            {{-- é nescassario fazer um segunda regra pois é um select mulplo --}}
                                @isset($immobile)
                                    {{ $immobile->proximity->contains($proximity->id) ? 'selected' : '' }}
                                @endisset
                            @endif                               
                        >{{ $proximity->name }}</option>
                    @endforeach
                </select>
                <label>Pontos de Referência</label>
            </div>
        </div>
        {{-- endProximity --}} 
        {{-- type_id --}}       
        <div class="row">            
            <div class="input-field col s12">
                <select name="type_id" id="type_id">
                    <option value="" disabled selected>Selecione uma Tipo</option>
                    @foreach ($list_of_types as $type)
                    {{-- dando erro no old em editar --}}
                        <option value="{{ $type->id }}" {{ old('type_id', $immobile->type->id ?? '') == $type->id ? 'selected' : '' }} 
                        > {{ $type->name }}</option>
                    @endforeach
                </select>
                <label for="type_id">Tipo</label>
                @error('type_id')
                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                @enderror  
                
            </div> 
        </div>{{-- end type_id --}}
        {{-- goal_id --}}  
        <div class="row">            
            <div class="input-field col s12">
                <div>
                    <label>Finalidade</label>
                </div>
                @foreach ($list_of_goals as $goal)
                <span>
                    <label style="margin-right:30px">
                        <input type="radio" name="goal_id" id="goal_id"
                            class="with-gap" value="{{ $goal->id }}"
                            {{ old('goal_id', $immobile->goal->id ?? '') == $goal->id ? 'checked' : '' }}
                            >
                        <span>{{ $goal->name }}</span>
                    </label>
                </span>
                @endforeach            
                @error('goal_id')
                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                @enderror
            </div>
        </div>{{-- end goal_id --}}
        {{-- Preço | Dormitorios | Salas --}}
        <div class="row">
            {{-- price --}}
            <div class="input-field col s4">
                <input type="number" id="price" name="price" value="{{ old('price', $immobile->price ?? '') }}">
                <label for="price">Preço</label>
                @error('price')
                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                @enderror
            </div>{{-- end price --}}
            {{-- room --}}
            <div class="input-field col s4">
                <input type="number" id="room" name="room" value="{{ old('room', $immobile->room ?? '') }}">
                <label for="room">Quantidade de Quartos</label>
                @error('room')
                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                @enderror
            </div>{{-- end room --}}
            {{-- living_room --}}
            <div class="input-field col s4">
                <input type="number" id="living_room" name="living_room" value="{{ old('living_room', $immobile->living_room ?? '') }}">
                <label for="living_room">Quantidade de Salas</label>
                @error('living_room')
                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                @enderror
            </div>{{-- end living_room --}}
        </div>{{-- end row --}}
        {{-- Terreno | Banheiros | Garagens --}}
        <div class="row">
            {{-- ground --}}
            <div class="input-field col s4">
                <input type="number" id="ground" name="ground" value="{{ old('ground', $immobile->ground ?? '') }}">
                <label for="ground">Terreno em m²</label>
                @error('ground')
                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                @enderror
            </div>{{-- end ground --}}
            {{-- bathroom --}}
            <div class="input-field col s4">
                <input type="number" id="bathroom" name="bathroom" value="{{ old('bathroom', $immobile->bathroom ?? '') }}">
                <label for="bathroom">Quantidade de Banheiros</label>
                @error('bathroom')
                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                @enderror
            </div>{{-- end bathroom --}}        
            {{-- garage --}}
            <div class="input-field col s4">
                <input type="number" id="garage" name="garage" value="{{ old('garage', $immobile->garage ?? '') }}">
                <label for="garage">Vagas na Garagem</label>
                @error('garage')
                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                @enderror
            </div>{{-- end garage --}} 
        </div>
        {{-- descrytion --}}
        <div class="row">
            <div class="input-field col s12">
                <textarea id="descrytion" name="descrytion" class="materialize-textarea">{{ old('descrytion', $immobile->descrytion ?? '') }}</textarea>
                <label for="descrytion">Descrição</label>
                @error('descrytion')
                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
                @enderror
            </div>
        </div>{{-- end descrytion --}}
        {{-- buttons --}}
        <div class="right-align">
            <a href="{{ route('immobile.index') }}" class="btn-flat waves-effect">Cancelar</a>
            <button type="submit" class="btn waves-effect waves-light">Salvar</button>
        </div>{{-- end buttons --}}
    </form>
</section>
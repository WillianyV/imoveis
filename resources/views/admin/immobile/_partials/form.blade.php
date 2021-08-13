<section class="section">
    <form action="{{ $action }}" method="POST">
        @isset($city)
            @method('PUT')
        @endisset

        @csrf
        {{-- title --}}
        <div class="row">
            <div class="input-field col s12">
                <input type="text" id="title" name="title" value="{{ $immobile->title ?? old('title') }}">
                <label for="title">Titulo</label>
                @error('title')
                    <div class="red-text text-accent-3">
                        <small>{{ $errors->first('title') }}</small>
                    </div>
                @enderror
            </div>
        </div>{{-- end title --}}  
        {{-- city_id --}}   
        <div class="row">
            <div class="input-field col s12">
                <select name="city_id" id="city_id">
                    <option value="" disabled selected>Selecione uma Cidade</option>
                    @foreach ($list_of_cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
                <label for="city_id">Cidade</label>
                @error('city_id')
                    <div class="red-text text-accent-3">
                        <small>{{ $errors->first('city_id') }}</small>
                    </div>
                @enderror
            </div>
        </div>{{-- end city_id --}}
        {{-- ADDRESS --}}
        <div class="row">
            <div class="input-field col s5">
                <input type="text" name="street" id="street">
                <label for="street">Rua</label>
            </div>
            <div class="input-field col s2">
                <input type="number" name="house_number" id="house_number">
                <label for="house_number">Número</label>
            </div>
            <div class="input-field col s2">
                <input type="text" name="complement" id="complement">
                <label for="complement">Complemento</label>
            </div>
            <div class="input-field col s3">
                <input type="text" name="district" id="district">
                <label for="district">Bairro</label>
            </div>            
        </div>
        {{-- END ADDRESS --}}
        {{-- Proximity --}}
        <div class="row">            
            <div class="input-field col s12">
                <select multiple name="proximity[]" id="proximity">
                    <option value="" disabled>Selecione os pontos de interesse nas aproximidades</option>
                    @foreach ($list_of_proximitys as $proximity)
                        <option value="{{ $proximity->id }}">{{ $proximity->name }}</option>
                    @endforeach
                </select>
                <label>Pontos de Referência</label>
            </div>
        </div>
        {{-- endProximity --}} 
        {{-- type_id --}}       
        <div class="row">            
            <div class="input-field col s12">
                {{-- <input type="text" id="type_id" name="type_id" value="{{ $immobile->type_id ?? old('type_id') }}"> --}}
                <select name="type_id" id="type_id">
                    <option value="" disabled selected>Selecione uma Tipo</option>
                    @foreach ($list_of_types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
                <label for="type_id">Tipo</label>
                @error('type_id')
                    <div class="red-text text-accent-3">
                        <small>{{ $errors->first('type_id') }}</small>
                    </div>
                @enderror  
            </div> 
        </div>{{-- end type_id --}}
        {{-- goal_id --}}  
        <div class="row">            
            <div class="input-field col s12">
                <div>
                    <label>Finalidade</label>
                </div>
                {{-- <input type="text" id="goal_id" name="goal_id" value="{{ $immobile->goal_id ?? old('goal_id') }}"> --}}
                @foreach ($list_of_goals as $goal)
                <span>
                    <label style="margin-right:30px">
                        <input type="radio" name="goal_id" id="goal_id"
                            class="with-gap" value="{{ $goal->id }}">
                        <span>{{ $goal->name }}</span>
                    </label>
                </span>
                @endforeach            
                @error('goal_id')
                <div class="red-text text-accent-3">
                    <small>{{ $errors->first('goal_id') }}</small>
                </div>
                @enderror
            </div>
        </div>{{-- end goal_id --}}
        {{-- Preço | Dormitorios | Salas --}}
        <div class="row">
            {{-- price --}}
            <div class="input-field col s4">
                <input type="number" id="price" name="price" value="{{ $immobile->price ?? old('price') }}">
                <label for="price">Preço</label>
                @error('price')
                    <div class="red-text text-accent-3">
                        <small>{{ $errors->first('price') }}</small>
                    </div>
                @enderror
            </div>{{-- end price --}}
            {{-- room --}}
            <div class="input-field col s4">
                <input type="number" id="room" name="room" value="{{ $immobile->room ?? old('room') }}">
                <label for="room">Quantidade de Quartos</label>
                @error('room')
                    <div class="red-text text-accent-3">
                        <small>{{ $errors->first('room') }}</small>
                    </div>
                @enderror
            </div>{{-- end room --}}
            {{-- living_room --}}
            <div class="input-field col s4">
                <input type="number" id="living_room" name="living_room" value="{{ $immobile->living_room ?? old('living_room') }}">
                <label for="living_room">Quantidade de Salas</label>
                @error('living_room')
                    <div class="red-text text-accent-3">
                        <small>{{ $errors->first('living_room') }}</small>
                    </div>
                @enderror
            </div>{{-- end living_room --}}
        </div>{{-- end row --}}
        {{-- Terreno | Banheiros | Garagens --}}
        <div class="row">
            {{-- ground --}}
            <div class="input-field col s4">
                <input type="number" id="ground" name="ground" value="{{ $immobile->ground ?? old('ground') }}">
                <label for="ground">Terreno em m²</label>
                @error('ground')
                    <div class="red-text text-accent-3">
                        <small>{{ $errors->first('ground') }}</small>
                    </div>
                @enderror
            </div>{{-- end ground --}}
            {{-- bathroom --}}
            <div class="input-field col s4">
                <input type="number" id="bathroom" name="bathroom" value="{{ $immobile->bathroom ?? old('bathroom') }}">
                <label for="bathroom">Quantidade de Banheiros</label>
                @error('bathroom')
                    <div class="red-text text-accent-3">
                        <small>{{ $errors->first('bathroom') }}</small>
                    </div>
                @enderror
            </div>{{-- end bathroom --}}        
            {{-- garage --}}
            <div class="input-field col s4">
                <input type="number" id="garage" name="garage" value="{{ $immobile->garage ?? old('garage') }}">
                <label for="garage">Vagas na Garagem</label>
                @error('garage')
                    <div class="red-text text-accent-3">
                        <small>{{ $errors->first('garage') }}</small>
                    </div>
                @enderror
            </div>{{-- end garage --}} 
        </div>
        {{-- descrytion --}}
        <div class="row">
            <div class="input-field col s12">
                <textarea id="descrytion" name="descrytion" class="materialize-textarea">{{ $immobile->descrytion ?? old('descrytion') }}</textarea>
                <label for="descrytion">Descrição</label>
                @error('descrytion')
                    <div class="red-text text-accent-3">
                        <small>{{ $errors->first('descrytion') }}</small>
                    </div>
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
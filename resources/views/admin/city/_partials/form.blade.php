<section class="section">
    <form action="{{ $action }}" method="POST">
        @isset($city)
            @method('PUT')
        @endisset

        @csrf
        {{-- name --}}
        <div class="input-field">
            <input type="text" id="name" name="name" value="{{ $city->name ?? old('name') }}">
            <label for="name">Nome</label>
            @error('name')
                <div class="red-text text-accent-3">
                    <small>{{ $errors->first('name') }}</small>
                </div>
            @enderror
        </div>
        {{-- end name --}}
        {{-- buttons --}}
        <div class="right-align">
            <a href="{{ route('city.index') }}" class="btn-flat waves-effect">Cancelar</a>
            <button type="submit" class="btn waves-effect waves-light">Salvar</button>
        </div>{{-- end buttons --}}
    </form>
</section>

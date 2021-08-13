<section class="section">
    <form action="{{ $action }}" method="POST">
        @isset($city)
            @method('PUT')
        @endisset

        @csrf
        {{-- name --}}
        <div class="input-field">
            <input type="text" id="name" name="name" value="{{ old('title', $city->name ?? '') }}">
            <label for="name">Nome</label>
            @error('name')
                    <span class="red-text text-accent-3"><small>{{ $message }}</small></span>
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

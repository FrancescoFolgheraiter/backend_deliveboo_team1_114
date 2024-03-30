@extends('layouts.app')

@section('page-title', 'Categoria ristorante')

@section('main-content')
<div class="row">
    <div class="col">
        <div class="card p-2">
            <div class="car-body">
                <h1 class="text-center">
                    Modifica la categoria del tuo ristorante
                </h1>
                <hr>
                <div>
                    <form action="{{ route('admin.dashboard.users.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="resturant-image" class="form-label">
                                Cambia l'immagine di copertina del tuo locale
                            </label>
                            <input value="{{ old('resturant-image') }}" type="file" class="form-control" @error('resturant-image') is-invalid @enderror id="resturant-image" name="resturant-image" placeholder="Aggiungi la tua nuova immagine del piatto..." maxlength="2048">
                            @error('resturant-image')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tecnologie</label>
            
                            <div>
                                @foreach ($types as $type)
                                    <div class="form-check form-check-inline">
                                        <input
                                            {{-- Se c'è l'old, vuol dire che c'è stato un errore --}}
                                            @if ($errors->any())
                                                {{-- Faccio le verifiche sull'old --}}
                                                {{ in_array($type->id, old('types', [])) ? 'checked' : '' }}
                                            @else
                                                {{-- Faccio le verifiche sulla collezione --}}
                                                {{ $user->types->contains($type->id) ? 'checked' : '' }}
                                            @endif
                                            class="form-check-input"
                                            type="checkbox"
                                            id="type-{{ $type->id }}"
                                            name="types[]"
                                            value="{{ $type->id }}">
                                        <label class="form-check-label" for="type-{{ $type->id }}">{{ $type->name }}</label>
                                    </div>
                                    @endforeach
                                    @error('types')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                        </div>
                        <div>
                           <button type="submit" class="btn btn-warning w-100">
                                 Modifica
                           </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
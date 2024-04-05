@extends('layouts.app')

@section('page-title', 'Edit '.$user->resturant_name)

@section('main-content')
<div class="custom-container">
    <div class="custom-card-create p-2">
        <h2 class="text-center text-color-3">
            Modifica <span class="text-danger">{{ $user->resturant_name }}</span>
        </h2>
        {{-- reindirizzamento ad update, ricordarsi di usare method PUT --}}
        <form action="{{ route('admin.dashboard.users.update')}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row d-flex justify-content-center">
                <div class="px-5 py-3">
                    <div class="mb-4 card p-2">
                        <h5 class="text-center my-3">
                            Anteprima immagine attuale
                        </h5>
                        <div class="edit-user-img-box mx-auto mb-4">
                            <img src="/storage/{{ $user->resturant_image  }}" alt="{{ $user->resturant_name }}">
                        </div>
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
        
                    <div class="mb-3 card p-2">
                        <label class="form-label text-center">Tipologie</label>
        
                        <div class="row text-center">
                            <div class="col-12">
                                @foreach ($types->take($types->count() / 2) as $key => $type)
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
                            </div>
                            <div class="col-12">
                                @foreach ($types->skip($types->count() / 2) as $key => $type)
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
                            </div>
                            @error('types')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                       <button type="submit" class="btn btn-danger fw-bolder w-25">
                             Modifica
                       </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
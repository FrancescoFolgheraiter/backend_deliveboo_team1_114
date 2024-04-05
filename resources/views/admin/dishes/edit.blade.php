@extends('layouts.app')

@section('page-title', 'Edit '.$dish->name)

@section('main-content')
<div class="custom-container">
    <div class="custom-card-create p-2">
        <h2 class="text-center text-color-3">
            Modifica <span class="text-danger">{{ $dish->name }}</span>
        </h2>
        {{-- reindirizzamento ad update, ricordarsi di usare method PUT --}}
        <form action="{{ route('admin.dishes.update', ['dish' => $dish->id]) }}" method="POST" enctype="multipart/form-data"> 
            @csrf

            {{-- grazie a blade, utilizzo il method PUT - altrimenti ritornerei a store --}}
            @method('PUT')

            <div class="row d-flex justify-content-center">
                <div class="px-5 py-3">
                    <div class="mb-3 form-floating">
                        <input value="{{ old('name', $dish->name) }}" type="text" class="form-control" @error('name') is-invalid @enderror id="name" name="name" placeholder="Inserisci il nome del tuo piatto modificato..." maxlength="64" required>
                        <label for="name" class="form-label">Modifica il nome del tuo piatto</label>
                        @error('name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3 text-center card p-2">
                        @if ($dish->image != null)
                            <div>
                                <h4 class="mb-2">
                                    Immagine del piatto attuale
                                </h4>
                                <div>
                                    <div class="edit-img-box mx-auto">
                                        <img src="/storage/{{ $dish->image }}" alt="{{ $dish->name }}">
                                    </div>
                                    <div class="form-check d-flex justify-content-center mt-2">
                                        <input class="form-check-input" type="checkbox" value="1" id="delete_image" name="delete_image">
                                        <label class="form-check-label ps-2" for="delete_image">
                                            Cancella l'immagine attuale
                                        </label>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="card p-2 mb-3">
                        <label for="image" class="form-label .text-color">
                            Aggiungi la tua nuova immagine del piatto
                        </label>
                        <input value="{{ old('image') }}" type="file" class="form-control" @error('image') is-invalid @enderror id="image" name="image" placeholder="Aggiungi la tua nuova immagine del piatto..." maxlength="2048">
                        @error('image')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3 form-floating">
                                <input type="number" class="form-control" @error('price') is-invalid @enderror value="{{ $dish->price }}" id="price" name="price" placeholder="Inserisci il tuo prezzo modificato..." step="0.01" min="1" max="999.99" required>
                                <label for="price" class="form-label">Prezzo Modificato</label>
                                @error('price')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3 form-floating">
                                <select name="visible" id="visible" class="form-select" required @error('visible') is-invalid @enderror>
                                    <option value="" {{ old('visible', $dish->visible) == null ? 'selected' : '' }}>
                                        Seleziona una se il piatto è disponibile...
                                    </option>
                                    <option value="0" {{ old('visible', $dish->visible) == 0 ? 'selected' : '' }} class=" text-danger">
                                        Non disponibile
                                    </option>
                                    <option value="1" {{ old('visible', $dish->visible) == 1 ? 'selected' : '' }} class="text-success">
                                        Disponibile
                                    </option>
                                </select>
                                <label for="visible" class="form-label">Disponibile <span class="text-danger">*</span></label>
                                @error('visible')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="description" class="form-label fw-bolder">Modifica la descrizione del tuo piatto</label>
                                <textarea class="form-control" @error('description') is-invalid @enderror id="description" name="description" rows="5" maxlength="5000" placeholder="Inserisci la descrizione del tuo piatto modificato...">{{ old('description', $dish->description) }}</textarea>
                                @error('description')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="mb-3">
                                <label for="ingredients" class="form-label fw-bolder">Modifica gli ingredienti del tuo piatto</label>
                                <textarea class="form-control" @error('ingredients') is-invalid @enderror id="ingredients" name="ingredients" rows="5" maxlength="500" placeholder="Inserisci gli ingredienti del tuo piatto modificato...">{{ old('ingredients', $dish->ingredients) }}</textarea>
                                @error('ingredients')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-color btn-outline-danger fw-bolder text-white w-25 ">
                            Modifica
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
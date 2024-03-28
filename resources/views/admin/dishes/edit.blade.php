@extends('layouts.app')

@section('page-title', 'Edit '.$dish->name)

@section('main-content')
<div class="d-flex justify-content-end pt-3">
    <a href="{{ route('admin.dishes.index') }}" class="btn btn-light my-badge text-dark fw-bolder">
        <- Ritorna ai tuoi piatti
    </a>
</div>
<h1 class="text-dark">
    Modifica <span class="text-danger">{{ $dish->name }}</span>
</h1>

<div class="row">
    <div class="col py-4">
        {{-- reindirizzamento ad update, ricordarsi di usare method PUT --}}
        <form action="{{ route('admin.dishes.update', ['dish' => $dish->id]) }}" method="POST" enctype="multipart/form-data"> 
            @csrf

            {{-- grazie a blade, utilizzo il method PUT - altrimenti ritornerei a store --}}
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label fw-bolder">Modifica il nome del tuo piatto</label>
                <input value="{{ old('name', $dish->name) }}" type="text" class="form-control" @error('name') is-invalid @enderror id="name" name="name" placeholder="Inserisci il nome del tuo piatto modificato..." maxlength="64" required>
                @error('name')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">
                    Aggiungi la tua nuova immagine del piatto
                </label>
                <input value="{{ old('image') }}" type="file" class="form-control" @error('image') is-invalid @enderror id="image" name="image" placeholder="Aggiungi la tua nuova immagine del piatto..." maxlength="2048">
                @error('image')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror

                @if ($dish->image != null)
                    <div>
                        <h3>
                            La tua immagine del piatto attuale
                        </h3>
                        <div class="img-box">
                            <img src="/storage/{{ $dish->image }}" alt="{{ $dish->name }}">
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="delete_image" name="delete_image">
                            <label class="form-check-label" for="delete_image">
                                Cancella l'immagine attuale
                            </label>
                        </div>
                    </div>
                @endif
            </div>

            <div class="mb-3">
                <label for="description" class="form-label fw-bolder">Modifica la descrizione del tuo piatto</label>
                <textarea class="form-control" @error('description') is-invalid @enderror id="description" name="description" rows="3" maxlength="5000" placeholder="Inserisci la descrizione del tuo piatto modificato...">{{ old('description', $dish->description) }}</textarea>
                @error('description')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ingredients" class="form-label fw-bolder">Modifica gli ingredienti del tuo piatto</label>
                <textarea class="form-control" @error('ingredients') is-invalid @enderror id="ingredients" name="ingredients" rows="3" maxlength="500" placeholder="Inserisci gli ingredienti del tuo piatto modificato...">{{ old('ingredients', $dish->ingredients) }}</textarea>
                @error('ingredients')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prezzo Modificato</label>
                <input type="number" class="form-control" @error('price') is-invalid @enderror value="{{ old('price') }}" id="price" name="price" placeholder="Inserisci il tuo prezzo modificato..." step="0.01" min="1" max="999.99" required>
                @error('price')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="visible" class="form-label fw-bolder">Disponibile<span class="text-danger">*</span></label>
                <select name="visible" id="visible" class="form-select" @error('visible') is-invalid @enderror>
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
                @error('visible')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="d-flex justify-content-center ">
                <button type="submit" class="btn btn-success w-25 ">
                    Modifica
                </button>
             </div>
        </form>
    </div>
</div>
@endsection
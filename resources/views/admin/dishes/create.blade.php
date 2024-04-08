@extends('layouts.app')

@section('page-title', 'Aggiungi un nuovo piatto')

@section('main-content')
<div class="custom-container">
    <div class="custom-card-create p-3">
        <h2 class="text-center text-shadow text-color-3">
            Aggiungi un nuovo piatto
        </h2>
        <form action="{{ route('admin.dishes.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="row d-flex justify-content-center">
                <div class="px-5 py-3">
                    <!--nome-->
                    <div class="mb-3 form-floating">
                        <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" placeholder="Inserisci il nome..." maxlength="255" required value="{{ old('name') }}">
                        <label for="name" class="form-label">Nome del piatto <span class="text-danger">*</span></label>
                        @error('name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <!--fine nome-->
                    <!--Image-->
                    <div class="mb-3 text-center">
                        <label for="image" class="form-label">Carica l'immagine del piatto</label>
                        <input class="form-control" type="file" id="image" name="image">
                        {{-- gestione errore --}}
                        @error('image')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                        @enderror
                    </div>
                    <!--fine image-->
                    <div class="row">
                        <div class="col-6">
                                <!--price-->
                            <div class="mb-3 form-floating">
                                <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Inserisci il prezzo..." min="0.5" max="999" value="{{ old('price') }}" required>
                                <label for="price" class="form-label">Prezzo <span class="text-danger">*</span></label>
                                @error('price')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                @enderror
                            </div>
                            <!--fine price-->
                        </div>
                        <div class="col-6">
                            <!--piatto visibile-->
                            <div class="mb-3 form-floating">
                                <select name="visible" id="visible" class="form-select" required>
                                    <option value="" {{ old('visible') == null ? 'selected' : '' }}>
                                        Seleziona una se il piatto è disponibile..
                                    </option>
                                    <option value="0" {{ old('visible') == 0 ? 'selected' : '' }} class=" text-danger ">
                                        Non disponibile
                                    </option>
                                    <option value="1" {{ old('visible') == 1 ? 'selected' : '' }} class="text-success">
                                        Disponibile
                                    </option>
                                </select>
                                <label for="visible" class="form-label">Disponibilità <span class="text-danger">*</span></label>
                                @error('visible')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> 
                            <!--fine piatto visibile-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <!--ingredienti-->
                            <div class="mb-3">
                                <label for="ingredients" class="form-label">Ingredienti <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="ingredients" name="ingredients" rows="5" placeholder="Inserisci gli ingredienti separati da virgola" required>{{ old('ingredients') }}</textarea>
                                @error('ingredients')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!--fine ingredienti-->
                        </div>
                        <div class="col-6">
                            <!--descrizione-->
                            <div class="mb-3">
                                <label for="description" class="form-label">Descrizione</label>
                                <textarea class="form-control" id="description" name="description" rows="5" placeholder="Inserisci la descrizione...">{{ old('description') }}</textarea>
                                @error('description')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                @enderror
                            </div>
                            <!--fine descrizione-->
                        </div>
                    </div>
                    <div class="d-flex justify-content-center pt-3">
                        <button type="submit" class="btn btn-color btn-outline-danger text-shadow text-white fw-bolder w-25 ">
                            + Aggiungi
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('page-title', 'Aggiungi un nuovo piatto')

@section('main-content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h1 class="text-center">
                    Aggiungi un nuovo piatto
                </h1>
                <form action="{{ route('admin.dishes.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!--nome-->
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bolder">Nome del piatto <span class="text-danger">*</span></label>
                        <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" placeholder="Inserisci il nome..." maxlength="255" required value="{{ old('name') }}">
                        @error('name')
                             <div class="alert alert-danger">
                                 {{ $message }}
                             </div>
                        @enderror
                     </div>
                     <!--fine nome-->
                     <!--descrizione-->
                     <div class="mb-3">
                        <label for="description" class="form-label fw-bolder">Descrizione</label>
                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Inserisci la descrizione...">{{ old('description') }}</textarea>
                        @error('description')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                        @enderror
                    </div>
                    <!--fine descrizione-->
                    <!--ingredienti-->
                    <div class="mb-3">
                        <label for="ingredients" class="form-label fw-bolder">Ingredienti (spera gli ingredienti con una virgola) <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="ingredients" name="ingredients" rows="3" placeholder="Inserisci gli ingredienti separati da virgola (,)" required>{{ old('ingredients') }}</textarea>
                        @error('ingredients')
                             <div class="alert alert-danger">
                                 {{ $message }}
                             </div>
                        @enderror
                    </div>
                    <!--fine ingredienti-->
                    <!--price-->
                    <div class="mb-3">
                        <label for="price" class="form-label fw-bolder">Prezzo <span class="text-danger">*</span></label>
                        <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Inserisci il prezzo..." min="0.5" max="999" value="{{ old('price') }}" required>
                        @error('price')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                        @enderror
                    </div>
                    <!--fine price-->
                    <!--piatto visibile-->
                    <div class="mb-3">
                        <label for="visible" class="form-label fw-bolder">Disponibile <span class="text-danger">*</span></label>
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
                        @error('visible')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                       @enderror
                    </div> 
                    <!--fine piatto visibile-->
                    <!--Image-->
                    <div class="mb-3">
                        <label for="image" class="form-label fw-bolder">Carica l'immagine del piatto</label>
                        <input class="form-control" type="file" id="image" name="image">
                        {{-- gestione errore --}}
                        @error('image')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                        @enderror
                    </div>
                    <!--fine image-->
                    <div class="d-flex justify-content-center ">
                        <button type="submit" class="btn btn-color btn-outline-danger text-white fw-bolder w-25 ">
                              + Aggiungi
                        </button>
                     </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
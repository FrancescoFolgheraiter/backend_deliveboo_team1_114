@extends('layouts.app')

@section('page-title', $dish->name)

@section('main-content')
    <div class="d-flex justify-content-end py-3">
        <a href="{{ route('admin.dishes.index') }}" class="btn btn-light my-badge text-dark fw-bolder">
            <- Ritorna ai tuoi piatti
        </a>
    </div>
    <div class="row">
        <div class="col">
            <div class="card my-badge">
                <div class="card-body text-secondary text-center">
                    <h1 class="text-dark mb-2">
                        {{ $dish->name }}
                    </h1>

                    <div class="mb-4">
                        @if ($dish->visible == 0)
                            <span class="fw-bolder text-danger">
                                Questo piatto non è al momento disponibile
                            </span>  
                        @else
                            <span class="fw-bolder text-success">
                                Questo piatto è al momento disponibile 
                            </span>  
                        @endif
                    </div>

                    @if ($dish->image != null)
                        <div class="img-box mx-auto mb-4">
                            <img src="/image/seeder_dishes/{{ $dish->image }}" alt="{{ $dish->name }}">
                        </div>
                    @endif

                    <h3 class="mb-5">
                        <div class="mb-2">
                            DESCRIZIONE
                        </div>
                        <span class="text-dark">
                            {{ $dish->description }}
                        </span>
                    </h3>

                    <h3 class="mb-5">
                        <div class="mb-2">
                            INGREDIENTI
                        </div>
                        <span class="text-dark">
                            @php
                                // decodifico il json e separo ogni ingrediente con una virgola
                                $decodedIngredients = json_decode($dish->ingredients);
                                $ingredients = implode(", ", $decodedIngredients);
                            @endphp

                            {{ $ingredients }}
                        </span>
                    </h3>

                    <h3 class="mb-5">
                        <div class="mb-2">
                            PREZZO
                        </div>
                        <span class="text-dark">
                            {{ $dish->price }} €
                        </span>
                    </h3>

                    <h3 class="mb-5">
                        <div>
                            RISTORANTE
                        </div>
                        <span class="text-dark">
                            {{ $dish->user->resturant_name }}
                        </span>
                    </h3>
                </div>
            </div>
        </div>
    </div>
@endsection
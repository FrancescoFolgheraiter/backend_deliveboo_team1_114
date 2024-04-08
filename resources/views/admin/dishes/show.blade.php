@extends('layouts.app')

@section('page-title', $dish->name)

@section('main-content')
    <div class="row">
        <div class="col-9">
            <div class="p-0 card my-user-card">
                <div class="d-flex justify-content-center">
                    <div>
                        {{-- se l'img non è null, fai vedere l'img del piatto --}}
                        @if ($dish->image != null)
                            <div class="img-box mx-auto">
                                <img src="/storage/{{ $dish->image }}" alt="{{ $dish->name }}">
                            </div>
                        @else
                            <div class="backup-img-box mx-auto">
                                <img src="/image/User/deliveboo-logo.png" alt="{{ $dish->name }}">
                            </div>
                        @endif
                        <h1 class="text-center text-color-2 text-shadow">
                            {{ $dish->name }}
                        </h1>
                        <div class="text-center mt-3">
                            {{-- in base alla visibilità del prodotto, ritorna if o else --}}
                            <div class="mb-4">
                                @if ($dish->visible == 0)
                                    <span class="fw-bolder text-color-3">
                                        Questo piatto non è al momento disponibile
                                    </span>  
                                @else
                                    <span class="fw-bolder text-success">
                                        Questo piatto è al momento disponibile 
                                    </span>  
                                @endif
                            </div>  
                        </div>
                        <div class="text-center b-white card w-80 p-4 mx-auto">
                            <h3 class="text-shadow">
                                {{ $dish->description }}
                            </h3>
                        </div>   
                    </div>
                    <!--fine contenuto principale di interazione utente-->
                </div>
            </div>
        </div>
        <div class="col-3 d-flex flex-column justify-content-between">
            
            <div class="card my-aside-card">
                <div>
                    <div class="logo-img-box mx-auto position-relative">
                        <img src="/image/User/deliveboo-logo.png" alt="Logo DeliveBoo">
                    </div>
                    <div class="position-absolute bottom-0">
                        <div class="text-center">
                            <div class="mb-5">
                                <div class="mb-5">
                                    {{-- mi vado a recuperare l'user(ristorante) che corrisponde a quel piatto --}}
                                    <h2 class="text-color-2 text-shadow">
                                        {{ $dish->user->resturant_name }}
                                    </h2>
                                </div>
                            </div>
                            <div class="mb-5 px-2">
                                <h4 class="my-3 text-center text-shadow">
                                    Ingredienti
                                </h4>
                                <div>
                                    @php
                                        $ingredients = explode(', ', $dish->ingredients);
                                    @endphp
                                    @foreach($ingredients as $ingredient)
                                        <span class="badge btn-color text-shadow">
                                            {{ $ingredient }}
                                        </span>
                                    @endforeach
                                </div>
                                {{-- <div>
                                    {{ $dish->ingredients }}
                                </div> --}}
                            </div>
                            <div class="mb-5">
                                <div class="mb-5">
                                    <h4 class="mb-2 text-shadow">
                                        Prezzo attuale
                                    </h4>
                                    <h3 class="text-color-2 text-shadow">
                                        {{ $dish->price }} €
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <div class="my-3 d-flex justify-content-around">
                            <div>
                                <a href="{{ route('admin.dishes.edit', ['dish' => $dish->id]) }}" class="btn btn-color btn-outline-danger fw-bolder text-shadow text-white">
                                    Modifica
                                </a>
                            </div>
                            <div>
                                <a class="btn fw-bolder btn-color text-shadow btn-outline-danger text-white" data-bs-toggle="modal" data-bs-target="#DishModal{{ $dish->id }}">
                                    Elimina
                                </a>
                            
                                <div class="modal fade" id="DishModal{{ $dish->id }}" tabindex="-1" aria-labelledby="DishModalLabel{{ $dish->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="DishModalLabel{{ $dish->id }}"><span class="text-danger">ATTENZIONE!</span></h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Sei sicuro di voler eliminare {{ $dish->name }}?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-dark fw-bolder" data-bs-dismiss="modal">Annulla</button>
                                                <form action="{{ route('admin.dishes.destroy', ['dish' => $dish->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger fw-bolder">
                                                        Elimina
                                                    </button>
                                                    @error('name')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('page-title', $dish->name)

@section('main-content')
    <div class="row">
        <div class="col-9">
            <div class="card my-user-card">
                <div class="card-body d-flex justify-content-center">
                    <div class="row w-100">
                        <div class="col-md-9 col-12 w-100">
                            <div class="flex-grow-1">
                                <div>
                                    <h1 class="text-center mb-3">
                                        {{ $dish->name }}
                                    </h1>
                                </div>            
                            </div>
                            {{-- se l'img non è null, fai vedere l'img del piatto --}}
                            @if ($dish->image != null)
                                <div class="img-box mx-auto mb-4">
                                    <img src="/storage/{{ $dish->image }}" alt="{{ $dish->name }}">
                                </div>
                            @endif
        
                            <div class="mb-5 text-center">
                                <h3 class="mb-3 text-color-2">
                                    Descrizione
                                </h3>
                                <h3>
                                    {{ $dish->description }}
                                </h3>
                            </div>   
                        </div>
                    </div>
                    <!--fine contenuto principale di interazione utente-->
                </div>
            </div>
        </div>
        <div class="col-3">
            
            <div class="card my-aside-card px-2">
                <div class="text-center my-3">
                    <h3>
                        Disponibilità
                    </h3>
                    {{-- in base alla visibilità del prodotto, ritorna if o else --}}
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
                </div>
                <div class="text-center">
                    <div class="mb-5">
                        <h3 class="mb-2">
                            Ingredienti
                        </h3>
                        <h4 class="text-color-2">
                            {{ $dish->ingredients }}
                        </h4>
                    </div>
                    <div class="mb-5">
                        <div class="mb-5">
                            <h3 class="mb-2">
                                Prezzo attuale
                            </h3>
                            <h4 class="text-color-2">
                                {{ $dish->price }} €
                            </h4>
                        </div>
                    </div>
                    <div class="mb-5">
                        <div class="mb-5">
                            <h3>
                                Ristorante
                            </h3>
    
                            {{-- mi vado a recuperare l'user(ristorante) che corrisponde a quel piatto --}}
                            <h4 class="text-color-2">
                                {{ $dish->user->resturant_name }}
                            </h4>
                        </div>
                    </div>
                    <div>
                        <div class="mb-5 d-flex justify-content-center flex-column">
                            <div>
                                <h4 class="mb-2">
                                    Modifica il tuo piatto
                                </h4>
                                <a href="{{ route('admin.dishes.edit', ['dish' => $dish->id]) }}" class="btn btn-warning fw-bolder text-white">
                                    Modifica
                                </a>
                            </div>
                            <div class="mt-5">
                                <h4 class="mb-2">
                                    Elimina il tuo piatto
                                </h4>
                                <a class="btn fw-bolder btn-color btn-outline-danger text-white" data-bs-toggle="modal" data-bs-target="#DishModal{{ $dish->id }}">
                                    Elimina
                                </a>
                            
                                <div class="modal fade" id="DishModal{{ $dish->id }}" tabindex="-1" aria-labelledby="DishModalLabel{{ $dish->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="DishModalLabel{{ $dish->id }}"><span class="text-danger">Eliminazione</span> del piatto {{ $dish->name }}</h1>
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

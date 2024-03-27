@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card my-user-card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        {{ $user->resturant_name }}
                    </h1>
                    <hr>
                    <!--contenuto principale di interazione utente-->
                    <div class="row h-75">
                        <div class="col-md-3 col-12 h-100 ">
                            <aside class="d-flex flex-column justify-content-around h-100">
                                <div>
                                    <h5>
                                        Località:
                                    </h5>
                                    {{ $user->address }}
                                </div>
                                <div>
                                    <h5>
                                        Tipologià di ristorante
                                    </h5>
                                    <ul>
                                        @foreach ($user->Types as $type)
                                        <li>
                                            {{ $type->name }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div>
                                    <h5>
                                        Immagine di copertina:
                                    </h5>
                                    {{ $user->resturant_image  }}
                                </div>
                                <div>
                                    <h5>
                                        Partita Iva:
                                    </h5>
                                    {{ $user->vat_number }}
                                </div>
                                <div>
                                    <h5>
                                        Utente creato in data:
                                    </h5>
                                    @php
                                    //prendo solo la data tramite explode lasciando perdere l'orario di creazione
                                       $date = explode(" ", $user->created_at);
                                    @endphp
                                    {{ $date[0]}}
                                </div>
                            </aside>
                        </div>
                        <div class="col-md-9 col-12 d-flex flex-column justify-content-between ">
                            <div>
                                <a href="{{ route('admin.dishes.create') }}" class="btn btn-outline-success">
                                    Aggiungi un nuovo piatto
                                </a> 
                            </div>
                            <div>
                                Ordini di oggi 
                            </div>
                            <div>
                                Vedi storico ordini
                            </div>      
                        </div>
                    </div>
                    <!--fine contenuto principale di interazione utente-->
                </div>
            </div>
        </div>
    </div>
@endsection

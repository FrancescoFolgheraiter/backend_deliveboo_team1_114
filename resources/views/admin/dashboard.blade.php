@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card my-user-card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        Nome del locale
                    </h1>
                    <hr>
                    <!--contenuto principale di interazione utente-->
                    <div class="row h-75">
                        <div class="col-md-3 col-12 h-100 ">
                            <aside class="d-flex flex-column justify-content-around h-100">
                                <div>
                                    Località
                                </div>
                                <div>
                                    Tipologià di ristorante
                                </div>
                                <div>
                                    Immagine di copertina
                                </div>
                            </aside>
                        </div>
                        <div class="col-md-9 col-12 d-flex flex-column justify-content-between ">
                            <div>
                                Vai alla modifica dei tuoi piatti
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

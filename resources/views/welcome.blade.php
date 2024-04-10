@extends('layouts.guest')

@section('main-content')
    <div class="custom-container">
        <div class="custom-card-welcome text-center p-3">
            <div class="card-body">
                <h2 class="mb-4">
                    Benvenuto!
                </h2>
                <div>
                    <a href="{{ route('register') }}" class="btn btn-color text-white btn-outline-danger w-100 fw-bolder">Registrati</a>
                </div>
                <div class="d-flex align-items-center my-3">
                    <div class="flex-grow-1 border-bottom"></div>
                    <div class="mx-3">
                        oppure
                    </div>
                    <div class="flex-grow-1 border-bottom"></div>
                </div>
                <div class="mb-3">
                    <a href="{{ route('login') }}" class="btn btn-color text-white btn-outline-danger w-100 fw-bolder">
                        <i class="fa-regular fa-envelope"></i> Accedi con la tua email
                    </a>
                </div>
                <p>
                    Procedendo acconsenti ai nostri <a href="#nogo" class="text-color-2">termini e condizioni</a>. 
                    Ti preghiamo di prendere anche visione della nostra <a href="#nogo" class="text-color-2">informativa 
                    sulla privacy</a>. Utilizziamo i tuoi dati per offrirti un'esperienza 
                    personalizzata e per migliorare il nostro servizio. <a href="#nogo" class="text-color-2">Leggi qui per 
                    maggiori informazioni</a>.
                </p>
                <div class="d-flex justify-content-center mt-4">
                    <div class="socials-card d-flex align-items-center flex-row">
                        <a href="#">
                            <div class="socialContainer containerOne">
                                <span class="text-dark"><i class="fa-brands fa-instagram"></i></span>
                            </div>
                        </a>
                        <a href="#">
                            <div class="socialContainer containerTwo">
                                <span class="text-dark"><i class="fa-brands fa-x-twitter"></i></span>
                            </div>
                        </a>
                        <a href="#">
                            <div class="socialContainer containerThree">
                                <span class="text-dark"><i class="fa-brands fa-facebook"></i></span>
                            </div>
                        </a>
                        <a href="https://github.com/FrancescoFolgheraiter/backend_deliveboo_team1_114">
                            <div class="socialContainer containerFour">
                                <span class="text-dark"><i class="fa-brands fa-github"></i></span>
                            </div> 
                        </a>                 
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

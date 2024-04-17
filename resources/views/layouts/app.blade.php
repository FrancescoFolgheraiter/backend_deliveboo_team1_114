<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="/image/User/logoremove.png" type="image/png">

        {{-- Font Awesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <title>@yield('page-title') | {{ 'DeliveBoo' }}</title>
        
        <!-- Scripts -->
        @vite('resources/js/app.js')
    </head>
    <body>
        <div class="row g-0">
            <div class="col-2">
                <aside id="responsive-aside" class=" pb-3 d-flex flex-column text-white">
                    <div class="top-aside">
                        <div class="d-flex justify-content-end">
                            <div class="img-aside-restaurant">
                                <img src="/storage/{{ $user->resturant_image }}" alt="{{ $user->name }}">
                            </div>
                        </div>
                        <h1 class="ps-3 mt-3 text-shadow-2">
                            {{ $user->resturant_name }}
                        </h1>
                        <p class="ps-3 fw-bolder text-color">
                            {{ $user->address }}
                        </p>
                        <button id="toggler-aside" class="navbar-toggler d-lg-none mt-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                            <i class="fa-solid fa-bars fa-2x"></i>
                        </button>
                    </div>
                    <div class="flex-grow-1 d-flex align-items-center ps-3">
                        <div id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed fw-bolder" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <h4 class="text-shadow-2">
                                            <i class="fa-solid fa-user-gear"></i><span class="ms-3">Utente</span>
                                        </h4>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body fw-bolder">
                                        <u class="text-decoration-none">
                                            <a class="nav-link" href="{{ route('admin.dashboard') }}">Il Tuo Locale</a>
                                        </u>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mt-5">
                                <h2 class="accordion-header">
                                    <button class="accordion-button fw-bolder collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <h4 class="text-shadow-2">
                                            <i class="fa-solid fa-utensils"></i><span class="ms-3">Piatti</span>
                                        </h4>
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body fw-bolder">
                                        <u class="text-decoration-none">
                                            <a class="nav-link" href="{{ route('admin.dishes.index') }}">Vedi I Tuoi Piatti</a>
                                        </u>
                                        <u class="text-decoration-none">
                                            <a class="nav-link" href="{{ route('admin.dishes.create') }}">Aggiungi un piatto</a>
                                        </u>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mt-5">
                                <h2 class="accordion-header">
                                    <button class="accordion-button fw-bolder collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <h4 class="text-shadow-2">
                                            <i class="fa-solid fa-arrow-down-a-z"></i><span class="ms-3">Ordini</span>
                                        </h4>
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body fw-bolder">
                                        <u class="text-decoration-none">
                                            <a class="nav-link" href="{{ route('admin.orders.index') }}">Vedi I Tuoi Ordini</a>
                                        </u>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mt-5">
                                <h2 class="accordion-header">
                                    <button class="accordion-button fw-bolder collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        <h4 class="text-shadow-2">
                                            <i class="fa-solid fa-chart-simple"></i><span class="ms-3">Statistiche</span>
                                        </h4>
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body fw-bolder">
                                        <u class="text-decoration-none">
                                            <a class="nav-link" href="{{ route('admin.statistics.salesCurrentYear') }}">Vendite anno corrente</a>
                                        </u>
                                    </div>
                                </div>
                                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body fw-bolder">
                                        <u class="text-decoration-none">
                                            <a class="nav-link" href="{{ route('admin.statistics.totalSales') }}">Totale vendite</a>
                                        </u>
                                    </div>
                                </div>
                                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body fw-bolder">
                                        <u class="text-decoration-none">
                                            <a class="nav-link" href="{{ route('admin.statistics.dishesSales') }}">Totale piatti venduti</a>
                                        </u>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bottom-aside ps-3">
                        <div class="mb-3">
                            <h5 class="mb-0 text-shadow-2">
                                Partita Iva:
                            </h5>
                            <span class="fw-bolder">
                                {{ $user->vat_number }}
                            </span>
                        </div>
                        <div>
                            <h5 class="mb-0 text-shadow-2">
                                Utente creato in data:
                            </h5>
                            @php
                            //prendo solo la data tramite explode lasciando perdere l'orario di creazione
                               $date = explode(" ", $user->created_at);
                            @endphp
                            <div class="fw-bolder">
                                {{ $date[0]}}
                            </div>
                        </div>
                    </div>
                </aside>
                <div class="offcanvas-aside">
                    <div class="offcanvas offcanvas-start bg-color" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body d-flex flex-column">
                            <div class="top-aside">
                                
                                <h1 class="ps-3 text-shadow-2">
                                    {{ $user->resturant_name }}
                                </h1>
                                <p class="ps-3 fw-bolder text-color">
                                    {{ $user->address }}
                                </p>
                            </div>
                            <div class="flex-grow-1 d-flex align-items-center ps-3">
                                <div id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed fw-bolder" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                <h4 class="text-shadow-2">
                                                    <i class="fa-solid fa-user-gear"></i><span class="ms-3">Utente</span>
                                                </h4>
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body fw-bolder">
                                                <u class="text-decoration-none">
                                                    <a class="nav-link" href="{{ route('admin.dashboard') }}">Il Tuo Locale</a>
                                                </u>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item mt-5">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button fw-bolder collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                <h4 class="text-shadow-2">
                                                    <i class="fa-solid fa-utensils"></i><span class="ms-3">Piatti</span>
                                                </h4>
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body fw-bolder">
                                                <u class="text-decoration-none">
                                                    <a class="nav-link" href="{{ route('admin.dishes.index') }}">Vedi I Tuoi Piatti</a>
                                                </u>
                                                <u class="text-decoration-none">
                                                    <a class="nav-link" href="{{ route('admin.dishes.create') }}">Aggiungi un piatto</a>
                                                </u>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item mt-5">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button fw-bolder collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                <h4 class="text-shadow-2">
                                                    <i class="fa-solid fa-arrow-down-a-z"></i><span class="ms-3">Ordini</span>
                                                </h4>
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body fw-bolder">
                                                <u class="text-decoration-none">
                                                    <a class="nav-link" href="{{ route('admin.orders.index') }}">Vedi I Tuoi Ordini</a>
                                                </u>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item mt-5">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button fw-bolder collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                                <h4 class="text-shadow-2">
                                                    <i class="fa-solid fa-chart-simple"></i><span class="ms-3">Statistiche</span>
                                                </h4>
                                            </button>
                                        </h2>
                                        <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body fw-bolder">
                                                <u class="text-decoration-none">
                                                    <a class="nav-link" href="{{ route('admin.statistics.salesCurrentYear') }}">Vendite anno corrente</a>
                                                </u>
                                            </div>
                                        </div>
                                        <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body fw-bolder">
                                                <u class="text-decoration-none">
                                                    <a class="nav-link" href="{{ route('admin.statistics.totalSales') }}">Totale vendite</a>
                                                </u>
                                            </div>
                                        </div>
                                        <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                            <div class="accordion-body fw-bolder">
                                                <u class="text-decoration-none">
                                                    <a class="nav-link" href="{{ route('admin.statistics.dishesSales') }}">Totale piatti venduti</a>
                                                </u>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom-aside ps-3">
                                <div class="mb-3">
                                    <h5 class="mb-0 text-shadow-2">
                                        Partita Iva:
                                    </h5>
                                    <span class="fw-bolder">
                                        {{ $user->vat_number }}
                                    </span>
                                </div>
                                <div>
                                    <h5 class="mb-0 text-shadow-2">
                                        Utente creato in data:
                                    </h5>
                                    @php
                                    //prendo solo la data tramite explode lasciando perdere l'orario di creazione
                                       $date = explode(" ", $user->created_at);
                                    @endphp
                                    <div class="fw-bolder">
                                        {{ $date[0]}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10">
                <header>
                    <nav class="navbar navbar-expand-lg bg-body-tertiary px-5 py-2">
                        <div class="d-none d-lg-block">
                            <a class="nav-link" href="http://localhost:5174">
                                <div class="guest-header-logo">
                                    <img src="/image/User/soloscrittalogo.png" alt="LOGO">
                                </div>
                            </a>
                        </div>
                        <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarText">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
    
                                <button type="submit" class="button type1">
                                </button>
                            </form>
                        </div>
                    </nav>
                </header>
                <main class="m-5">
                    @yield('main-content')
                </main>
            </div>
        </div> 
    </body>
</html>

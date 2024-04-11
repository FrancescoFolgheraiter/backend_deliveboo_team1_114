<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Font Awesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <title>@yield('page-title') | {{ 'DeliveBoo' }}</title>
        
        <!-- Scripts -->
        @vite('resources/js/app.js')
    </head>
    <body>
        <div class="row g-0">
            <div class="col-2">
                <aside class="p-3 d-flex flex-column text-white">
                    <div class="top-aside d-flex flex-column align-items-center">
                        <div class="mt-3">
                            <div class="img-rounded">
                                <img src="/storage/{{ $user->resturant_image }}" alt="{{ $user->name }}">
                            </div>
                        </div>
                        <h1 class="text-center mt-3">
                            {{ $user->resturant_name }}
                        </h1>
                        <p class="fw-bolder text-center text-color">
                            {{ $user->address }}
                        </p>
                    </div>
                    <div class="flex-grow-1 d-flex justify-content-center align-items-center">
                        <div  id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed fw-bolder" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <h4>
                                            <a class="nav-link" href="{{ route('admin.dashboard') }}">Pagina Utente</a>
                                        </h4>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body text-color-2 fw-bolder">
                                        <u>
                                            <a class="nav-link" href="{{ route('admin.dashboard') }}">Il Tuo Locale</a>
                                        </u>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mt-5">
                                <h2 class="accordion-header">
                                    <button class="accordion-button fw-bolder collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <h4>
                                            <a class="nav-link" href="{{ route('admin.dishes.index') }}">I Tuoi Piatti</a>
                                        </h4>
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body text-color-2 fw-bolder">
                                        <u>
                                            <a class="nav-link" href="{{ route('admin.dishes.index') }}">Vedi I Tuoi Piatti</a>
                                        </u>
                                        <u>
                                            <a class="nav-link" href="{{ route('admin.dishes.create') }}">Aggiungi un piatto</a>
                                        </u>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mt-5">
                                <h2 class="accordion-header">
                                    <button class="accordion-button fw-bolder collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <h4>
                                            <a class="nav-link" href="{{ route('admin.orders.index') }}">I Tuoi Ordini</a>
                                        </h4>
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body text-color-2 fw-bolder">
                                        <u>
                                            <a class="nav-link" href="{{ route('admin.orders.index') }}">Vedi I Tuoi Ordini</a>
                                        </u>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item mt-5">
                                <h2 class="accordion-header">
                                    <button class="accordion-button fw-bolder collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        <h4>
                                            <a class="nav-link" href="{{ route('admin.orders.index') }}">Statistiche</a>
                                        </h4>
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body text-color-2 fw-bolder">
                                        <u>
                                            <a class="nav-link" href="{{ route('admin.statistics.salesCurrentYear') }}">Vendite anno corrente</a>
                                        </u>
                                    </div>
                                </div>
                                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body text-color-2 fw-bolder">
                                        <u>
                                            <a class="nav-link" href="{{ route('admin.statistics.totalSales') }}">Totale vendite</a>
                                        </u>
                                    </div>
                                </div>
                                <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body text-color-2 fw-bolder">
                                        <u>
                                            <a class="nav-link" href="{{ route('admin.statistics.dishesSales') }}">Totale piatti venduti</a>
                                        </u>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bottom-aside">
                        <div class="mb-3">
                            <h5 class="mb-0">
                                Partita Iva:
                            </h5>
                            <span class="text-color-2 fw-bolder">
                                {{ $user->vat_number }}
                            </span>
                        </div>
                        <div>
                            <h5 class="mb-0">
                                Utente creato in data:
                            </h5>
                            @php
                            //prendo solo la data tramite explode lasciando perdere l'orario di creazione
                               $date = explode(" ", $user->created_at);
                            @endphp
                            <div class="text-color-2 fw-bolder">
                                {{ $date[0]}}
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
            <div class="col-10">
                <header>
                    <nav class="navbar navbar-expand-lg bg-body-tertiary px-5 py-2">
                        <div>
                            <input type="search" placeholder=" Cerca..." class="form-control">
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

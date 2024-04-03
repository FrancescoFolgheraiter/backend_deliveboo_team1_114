<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('page-title') | {{ config('app.name', 'DeliveBoo') }}</title>

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
                        <p class="fw-bolder text-color">
                            {{ $user->address }}
                        </p>
                    </div>
                    <div class="flex-grow-1 d-flex justify-content-center align-items-center">
                        <div class="accordion" id="accordionExample">
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
                    <nav class="navbar navbar-expand-lg bg-body-tertiary">
                        <div class="container">
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
                        </div>
                    </nav>
                </header>
                <main class="mt-5">
                    <div class="container">
                        @yield('main-content')
                    </div>
                </main>
            </div>
        </div>
    </body>
</html>

@extends('layouts.guest')

@section('page-title', 'Register')

@section('main-content')
    <div class="custom-container">
        <div class="p-4 custom-card-register">
            <div class="text-center text-color">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <div class="mb-0">
                            @foreach ($errors->all() as $error)
                                <div>
                                    {{ $error }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <!-- Email Address -->
                            <div class="form-floating">
                                <input type="email" name="email" class="form-control" id="email">
                                <label for="email">Email</label>
                            </div>
    
                            <!--Adress-->
                            <div class="mt-4 form-floating">
                                <input type="text" id="address" name="address" class="form-control">
                                <label for="address">
                                    Indirizzo
                                </label>
                            </div>
    
                            <!-- Password -->
                            <div class="mt-4 form-floating">
                                <input type="password" id="password" name="password" class="form-control">
                                <label for="password">
                                    Password
                                </label>
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <!-- Name -->
                            <div class="form-floating">
                                <input type="text" id="resturant_name" name="resturant_name" class="form-control">
                                <label for="resturant_name">
                                    Nome del locale
                                </label>
                            </div>
    
                            <!--Partita Iva-->
                            <div class="mt-4 form-floating">
                                <input type="number" id="vat_number" name="vat_number" class="form-control">
                                <label for="vat_number">
                                    Partita IVA
                                </label>
                            </div>
    
                            <!-- Confirm Password -->
                            <div class="mt-4 form-floating">
                                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                                <label for="password_confirmation">
                                    Conferma Password
                                </label>
                            </div>
                        </div>
                    </div>
    
                    <!--immagine del locale-->
                    <div class="mt-4">
                        <label for="resturant_image" class="form-label fw-bolder"> Carica l'immagine del locale</label>
                        <input class="form-control" type="file" id="resturant_image" name="resturant_image">
                    </div>
            
                    <div class="mt-4">
                        <button type="submit" class="btn button-color fw-bolder text-white">
                            Registrati
                        </button>
        
                        <div class="mt-3 pb-3">
                            <a href="{{ route('login') }}" class="link-dark">
                                {{ __('Già registrato?') }}
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

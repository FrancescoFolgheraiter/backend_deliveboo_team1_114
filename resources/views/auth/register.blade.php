@extends('layouts.guest')

@section('page-title', 'Register')

@section('main-content')
    <div class="text-center">
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
    
            <!-- Name -->
            <div>
                <label for="resturant_name" class="fw-bolder">
                    Nome del locale
                </label>
                <div>
                    <input type="text" id="resturant_name" name="resturant_name">
                </div>
            </div>
    
            <!-- Email Address -->
            <div class="mt-4">
                <label for="email" class="fw-bolder">
                    Email
                </label>
                <div>
                    <input type="email" id="email" name="email">
                </div>
            </div>
    
            <!-- Password -->
            <div class="mt-4">
                <label for="password" class="fw-bolder">
                    Password
                </label>
                <div>
                    <input type="password" id="password" name="password">
                </div>
            </div>
    
            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation" class="fw-bolder">
                    Conferma Password
                </label>
                <div>
                    <input type="password" id="password_confirmation" name="password_confirmation">
                </div>
            </div>

            <!--Adress-->
            <div class="mt-4">
                <label for="address" class="fw-bolder">
                    Indirizzo
                </label>
                <div>
                    <input type="text" id="address" name="address">
                </div>
            </div>

            <!--Partita Iva-->
            <div class="mt-4">
                <label for="vat_number" class="fw-bolder">
                    Partita IVA
                </label>
                <div>
                    <input type="number" id="vat_number" name="vat_number">
                </div>
            </div>

            <!--immagine del locale-->
            <div class="mt-4">
                <label for="resturant_image" class="form-label fw-bolder"> Carica l'immagine del locale</label>
                <input class="form-control" type="file" id="resturant_image" name="resturant_image">
            </div>
    
            <div class="mt-4">
                <button type="submit" class="btn btn-outline-light fw-bolder">
                    Registrati
                </button>

                <div class="mt-3 pb-3">
                    <a href="{{ route('login') }}" class="link-light">
                        {{ __('Already registered?') }}
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection

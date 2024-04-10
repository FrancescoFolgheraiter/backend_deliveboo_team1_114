@extends('layouts.guest')

@section('page-title', 'Login')

@section('main-content')
    <div class="custom-container">
        <div class="px-4 pt-5 custom-card-login">
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
                <form method="POST" action="{{ route('login') }}">
                    @csrf
        
                    <div class="row">
                        <div class="col-12">
                            <!-- Email Address -->
                            <div class="form-floating">
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email">
                                <label for="email">
                                    Email
                                </label>
                            </div>
                
                            <!-- Password -->
                            <div class="mt-4 form-floating">
                                <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                                <label for="password" class="fw-bolder form-label">
                                    Password
                                </label>
                            </div>
                
                            <!-- Remember Me -->
                            <div class="mt-4">
                                <label for="remember_me" class="form-label">
                                    <input id="remember_me" type="checkbox" name="remember">
                                    <span class="fw-bolder">Remember me</span>
                                </label>
                            </div>
                
                            <div class="my-4">
                                <button class="btn button-color fw-bolder text-white" type="submit">
                                    Accedi
                                </button>
                            </div>

                            {{-- <div class="mt-3 pb-3">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="link-light">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                            </div> --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
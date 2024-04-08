@extends('layouts.app')

@section('page-title', 'Tutti i piatti')

@section('main-content')
<h1 class="text-center mb-4">
    I Tuoi Piatti
</h1>
<div class="custom-card-index-dishes">
    <div class="row">
        @foreach ($user->dishes as $dish)
            @if ($dish->delete == null)
                {{-- stampo solo nel caso delete non sia valorizzata //soft delete --}}
                <div class="col-lg-2 col-md-6 mb-4">
                    @if ($dish->image == null)
                        <div class="food-card" style="background-image: url('/image/User/deliveboo-logo.png');">
                    @else
                        <div class="food-card" style="background-image: url('/storage/{{ $dish->image }}');">
                    @endif
                        <div class="user-card-body">
                            <div class="card-body text-center overlay p-5">
                                <h5 class="card-title text-color-2">{{ $dish->name }}</h5>
                                <p class="card-text text-color-3 fw-bolder">Prezzo: {{ $dish->price }}</p>
                                <div class="p-3 d-flex justify-content-center align-items-center text-center mt-5">
                                    <a href="{{ route('admin.dishes.show', ['dish' => $dish->id]) }}" class="btn btn-color btn-outline-danger food-card-button text-white fw-bolder">
                                        Vedi
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
@endsection

@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    <div class="row">
        <div class="col-9">
            <div class="card my-user-card">
                <div class="card-body d-flex justify-content-center">
                    <div class="row w-100">
                        <div class="col-md-9 col-12 d-flex w-100">
                            <div class="flex-grow-1">
                                @if ($orders->isEmpty())
                                    <h3 class="text-center py-4">
                                        Non sono stati ancora effettuati ordini al tuo locale in data odierna.
                                    </h3>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <div class="loader">
                                            <div class="panWrapper">
                                                <div class="pan">
                                                    <div class="food"></div>
                                                    <div class="panBase"></div>
                                                    <div class="panHandle"></div>
                                                </div>
                                                <div class="panShadow"></div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <h2 class="text-center mb-4">
                                        Ordini di oggi
                                    </h2>
                                    <table class="table text-center table-auto">
                                        <thead>
                                            <tr>
                                                <th scope="col">Cliente</th>
                                                <th scope="col">Indirizzo</th>
                                                <th scope="col" class="text-center">Data dell'ordine</th>
                                                <th scope="col" class="text-center">Valore dell'ordine</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                            <tr>
                                                <th>
                                                    <a href="{{ route('admin.orders.show', ['order' => $order->id]) }}" class="text-color-3">
                                                        {{ $order->name }} {{ $order->surname }}
                                                    </a>
                                                </th>
                                                <td>
                                                    {{ $order->address }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $order->date }}
                                                </td>
                                                <td class="text-center">
                                                    {{ $order->total_price }} €
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                @endif
                            </div>   
                        </div>
                    </div>
                    <!--fine contenuto principale di interazione utente-->
                </div>
            </div>
        </div>
        <div class="col-3">
            <div class="mb-4">
                <div class="card p-3">
                    <h5 class="text-center">
                        Totale ordini giornalieri
                    </h5>
                    <h3 class="text-center fw-bolder text-color-3">
                        {{ $orders->count() }} ordini effettuati
                    </h3>
                </div>
            </div>
            <div class="card px-2">
                <div class="card mt-2 bg-color-2">
                    <div class="text-center mb-3">
                        <h5 class="text-center my-3">
                            Aggiungi un nuovo piatto al tuo ristorante
                        </h5>
                        <a href="{{ route('admin.dishes.create') }}" class="btn btn-color btn-outline-danger text-white fw-bolder">
                            <i class="fa-solid fa-plus"></i>
                        </a>
                    </div>
                </div>
                <div class="mt-4">
                    <h5 class="text-center mb-2">
                        Tipologià del tuo ristorante
                    </h5>
                    <div class="text-center">
                        @foreach ($user->Types as $type)
                            <span class="badge btn-color">
                                {{ $type->name }}
                            </span>
                        @endforeach
                    </div>
                </div>
                <div>
                    <h5 class="text-center mt-5">
                        Immagine attuale del tuo ristorante
                    </h5>
                    <div class="user-img-box mx-auto mb-4">
                        <img src="/storage/{{ $user->resturant_image  }}" alt="{{ $user->resturant_name }}">
                    </div>
                </div>
                <div class="text-center mb-4">
                    <!--permette il rindirizzamento per poter modificare la relazione user-types-->
                    <a href="{{ route('admin.dashboard.editUser')}}" class="btn btn-color btn-outline-danger text-white fw-bolder">
                        Modifica
                    </a> 
                </div> 
            </div>
        </div>
    </div>
@endsection

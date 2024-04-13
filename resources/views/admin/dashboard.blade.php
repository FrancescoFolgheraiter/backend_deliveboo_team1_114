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
                                    <div class="custom-card-table-order">
                                        <table class="table text-center table-auto table-hover">
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
                                                <tr onclick="window.location='{{ route('admin.orders.show', ['order' => $order->id]) }}'">
                                                    <td>
                                                        {{ $order->name }} {{ $order->surname }}
                                                    </td>
                                                    <td>
                                                        {{ $order->address }}
                                                    </td>
                                                    <td class="text-center">
                                                        {{ date('d-m-Y', strtotime($order->date)) }} alle {{ date('H:i:s', strtotime($order->date)) }} 
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $order->total_price }} €
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
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
                    <h5 class="text-center text-shadow">
                        Totale ordini giornalieri
                    </h5>
                    <h3 class="text-center fw-bolder text-color-2 text-shadow">
                        {{ $orders->count() }} ordini effettuati
                    </h3>
                </div>
            </div>
            <div class="card vh-card">
                <div>
                    <div class="user-img-box mx-auto mb-4">
                        <img src="/storage/{{ $user->resturant_image  }}" alt="{{ $user->resturant_name }}">
                    </div>
                </div>
                <div class="custom-card-user mb-4">
                    <div class="mt-4">
                        <h5 class="text-center mb-2 text-shadow">
                            Tipologià del tuo ristorante
                        </h5>
                        <div class="text-center">
                            @foreach ($user->Types as $type)
                                <span class="badge btn-color text-shadow">
                                    {{ $type->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="text-center mb-4">
                            <!--permette il rindirizzamento per poter modificare la relazione user-types-->
                            <a href="{{ route('admin.dashboard.editUser')}}" class="btn btn-color text-shadow btn-outline-danger text-white fw-bolder">
                                Modifica
                            </a>
                        </div>
                    </div>
                </div>
                <div class="text-center my-4">
                    <a href="{{ route('admin.dishes.create') }}" class="btn btn-color text-shadow btn-outline-danger text-white fw-bolder w-90">
                        {{-- <i class="fa-solid fa-plus"></i>  --}}Aggiungi un nuovo piatto
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

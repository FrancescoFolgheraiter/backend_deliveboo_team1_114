@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card my-user-card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        {{ $user->resturant_name }}
                    </h1>
                    <hr>
                    <!--contenuto principale di interazione utente-->
                    <div class="row h-75">
                        <div class="col-md-3 col-12 h-100 ">
                            <aside class="d-flex flex-column justify-content-around h-100">
                                <div>
                                    <h5>
                                        Località:
                                    </h5>
                                    {{ $user->address }}
                                </div>
                                <div>
                                    <h5>
                                        Tipologià di ristorante
                                    </h5>
                                    <ul>
                                        @foreach ($user->Types as $type)
                                        <li>
                                            {{ $type->name }}
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div>
                                    <!--permette il rindirizzamento per poter modificare la relazione user-types-->
                                    <a href="{{ route('admin.dashboard.editUser')}}" class="btn btn-outline-success">
                                        Modifica
                                    </a> 
                                </div>
                                <div>
                                    <h5>
                                        Immagine di copertina:
                                    </h5>
                                    <div class="img-box mx-auto mb-4">
                                        <img src="/storage/{{ $user->resturant_image  }}" alt="{{ $user->resturant_name }}">
                                    </div>
                                </div>
                                <div>
                                    <h5>
                                        Partita Iva:
                                    </h5>
                                    {{ $user->vat_number }}
                                </div>
                                <div>
                                    <h5>
                                        Utente creato in data:
                                    </h5>
                                    @php
                                    //prendo solo la data tramite explode lasciando perdere l'orario di creazione
                                       $date = explode(" ", $user->created_at);
                                    @endphp
                                    {{ $date[0]}}
                                </div>
                            </aside>
                        </div>
                        <div class="col-md-9 col-12 d-flex flex-column justify-content-between ">
                            <div>
                                <a href="{{ route('admin.dishes.create') }}" class="btn btn-outline-success">
                                    Aggiungi un nuovo piatto
                                </a> 
                            </div>
                            <div class="flex-grow-1 ">
                                @if ($orders->isEmpty())
                                    <h4>
                                        Non sono stati ancora effettuati ordini al tuo locale in data odierna.
                                    </h4>
                                @else
                                    <h4>
                                        Ordini di oggi:
                                    </h4>
                                    <table class="table">
                                        <thead >
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
                                                    <a href="{{ route('admin.orders.show', ['order' => $order->id]) }}">
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
                            <div>
                                Vedi storico ordini
                            </div>      
                        </div>
                    </div>
                    <!--fine contenuto principale di interazione utente-->
                </div>
            </div>
        </div>
    </div>
@endsection

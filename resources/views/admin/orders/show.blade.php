@extends('layouts.app')

@section('page-title', 'Ordine')

@section('main-content')
    <div class="row">
        <div class="col-9">
            <div class="card logo-background my-order-card">
                <div class="card-body d-flex justify-content-center">
                    <div class="row w-100">
                        <div class="col-md-9 col-12 d-flex w-100">
                            <div class="flex-grow-1">
                                <div>
                                    <h2 class="text-center text-shadow mb-3">
                                        Piatti ordinati
                                    </h2>
                                    <div class="custom-card-table-order">
                                        <!--Tabella visualizzazione contenuti table dishes-->
                                        <table class="table">
                                            <thead >
                                                <tr>
                                                    <th scope="col" class="text-start">Nome</th>
                                                    <th scoper="col" class="text-center">Quantità</th>
                                                    <th scope="col" class="text-center">Prezzo</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($order->dishes as $dish)
                                                        <tr>
                                                            <th scope="row" class="text-start">
                                                                {{ $dish->name }}
                                                            </th>
                                                            <td class="text-center">
                                                                {{-- qui viene preso il dato dalla tebella pivot --}}
                                                                {{ $dish->pivot->quantity }}
                                                            </td>
                                                            <td class="text-center">
                                                                {{ $dish->price }} €
                                                            </td>
                                                        </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{-- fine gestione tabella piatti  --}}
                                    </div>
                                </div>            
                            </div>   
                        </div>
                    </div>
                    <!--fine contenuto principale di interazione utente-->
                </div>
            </div>
        </div>
        <div class="col-3">
            
            <div class="card my-user-card p-1">
                <div class="custom-card-order mt-4 text-center">
                    <div class="text-center my-3">
                        <h3>
                            <span class="text-color-3 text-shadow fw-bolder">{{ $order->name }} {{ $order->surname }}</span>
                        </h3>  
                    </div>
                    <div class="mt-4 text-center">
                        <div class="mb-2">
                            <h5 class="mb-2">
                                Ordinato il
                            </h5>
                            <h4 class="text-color-3 text-shadow fw-bolder">
                                {{ date('d-m-Y', strtotime($order->date)) }}
                            </h4>
                        </div>
                        <div class="mb-5">
                            <h5 class="mb-2">
                                Alle ore
                            </h5>
                            <h4 class="text-color-3 text-shadow fw-bolder">
                                {{ date('H:i:s', strtotime($order->date)) }}
                            </h4>
                        </div>
                    </div>                 
                    <div class="mb-4">
                        <div>
                            <h5 class="mb-2">
                                Indirizzo dell'ordine
                            </h5>
                            <h4 class="text-color-3 text-shadow fw-bolder">
                                {{ $order->address }}
                            </h4>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div>
                            <h5 class="mb-2">
                                Numero di telefono
                            </h5>
                            <h4 class="text-color-3 text-shadow fw-bolder">
                                +39 {{ $order->phone_number }}
                            </h4>
                        </div>
                    </div>
                    <div>
                        <div class="mb-5">
                            <h5 class="mb-2">
                                Valore dell'ordine
                            </h5>
                            <h4 class="text-color-3 text-shadow fw-bolder">
                                {{ $order->total_price }} €
                            </h4>
                        </div>
    
                        <div class="m-5">
                            <h5>
                                Note lasciate dal cliente
                            </h5>
                            @if (!empty($order->note))
                                <h5 class="text-color-3 text-shadow fw-bolder">
                                    {{ $order->note }}
                                </h5>
                            @else
                                <p class="text-muted">Il cliente non ha lasciato note.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

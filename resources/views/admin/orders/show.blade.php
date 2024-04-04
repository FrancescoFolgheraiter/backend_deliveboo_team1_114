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
                                <div>
                                    <h2 class="text-center mb-3">
                                        Piatti ordinati
                                    </h2>
                                    <!--Tabella visualizzazione contenuti table dishes-->
                                    <table class="table">
                                        <thead >
                                            <tr>
                                                <th scope="col" class="text-start">Nome</th>
                                                <th scoper="col">Quantità</th>
                                                <th scope="col" class="text-center">Prezzo</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->dishes as $dish)
                                                    <tr>
                                                        <th scope="row" class="text-start">
                                                            {{ $dish->name }}
                                                        </th>
                                                        <td>
                                                            {{-- qui viene preso il dato dalla tebella pivot --}}
                                                            {{ $dish->pivot->quantity }}
                                                        </td>
                                                        <td class="text-center">
                                                            {{ $dish->price }}
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
                    <!--fine contenuto principale di interazione utente-->
                </div>
            </div>
        </div>
        <div class="col-3">
            
            <div class="card my-user-card px-2">
                <div class="text-center my-3">
                    <h3>
                        Ordinato da 
                    </h3>
                    <h2>
                        <span class="text-color-3 fw-bolder">{{ $order->name }} {{ $order->surname }}</span>
                    </h2>  
                </div>
                <div class="mt-4 text-center">
                    <div class="mb-5">
                        <h4 class="mb-2">
                            Ordinato in data 
                        </h4>
                        <h3 class="text-color-3 fw-bolder">
                            {{ $order->date }}
                        </h3>
                    </div>
                    <div class="mb-5">
                        <div>
                            <h4 class="mb-2">
                                Indirizzo dell'ordine
                            </h4>
                            <h3 class="text-color-3 fw-bolder">
                                {{ $order->address }}
                            </h3>
                        </div>
                    </div>
                    <div class="mb-5">
                        <div>
                            <h4 class="mb-2">
                                Numero di telefono
                            </h4>
                            <h3 class="text-color-3 fw-bolder">
                                +39 {{ $order->phone_number }}
                            </h3>
                        </div>
                    </div>
                    <div>
                        <div class="mb-5">
                            <h4 class="mb-2">
                                Valore dell'ordine
                            </h4>
                            <h3 class="text-color-3 fw-bolder">
                                {{ $order->total_price }} €
                            </h3>
                        </div>
    
                        <div class="mb-5">
                            <h4>
                                Note lasciate dal cliente
                            </h4>
                            @if (!empty($order->note))
                                <h5 class="text-color-3 fw-bolder">
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

@extends('layouts.app')

@section('page-title', 'Ordine')

@section('main-content')

    {{-- possibiltà di tornare a tutti gli ordini --}}
    <div class="d-flex justify-content-end py-3">
        <a href="{{ route('admin.orders.index') }}" class="btn btn-light my-badge text-dark fw-bolder">
            <- Ritorna ai tuoi piatti
        </a>
    </div>
    <div class="row">
        <div class="col">
            <div class="card my-badge">
                <div class="card-body text-secondary text-center">
                    <h1 class="text-dark mb-5">
                        Ordine di <span class="text-danger">{{ $order->name }} {{ $order->surname }}</span>
                    </h1>

                    <h3 class="mb-5">
                        <div class="mb-2">
                            ORDINATO ALLE
                        </div>
                        <span class="text-dark">
                            {{ $order->date }}
                        </span>
                    </h3>

                    <h3 class="mb-5 d-flex justify-content-center">
                        <div class="me-5">
                            <div class="mb-2">
                                INDIRIZZO DEL CLIENTE
                            </div>
                            <span class="text-dark">
                                {{ $order->address }}
                            </span>
                        </div>
                        <div>
                            <div class="mb-2">
                                NUMERO DI TELEFONO
                            </div>
                            <span class="text-dark">
                                +39 {{ $order->phone_number }}
                            </span>
                        </div>
                    </h3>

                    <h3 class="mb-5">
                        <div class="mb-2">
                            VALORE DELL'ORDINE
                        </div>
                        <span class="text-dark">
                            {{ $order->total_price }} €
                        </span>
                    </h3>

                    <h3 class="mb-5">
                        <div>
                            NOTE LASCIATE DAL CLIENTE
                        </div>

                        <span class="text-dark">
                            {{ $order->note }}
                        </span>
                    </h3>
                </div>
            </div>
        </div>
    </div>
@endsection
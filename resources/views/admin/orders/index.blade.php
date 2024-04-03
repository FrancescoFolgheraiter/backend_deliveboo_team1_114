@extends('layouts.app')

@section('page-title', 'Tutti gli ordini')

@section('main-content')
<div class="row">
    <div class="col">
        <div class="card p-2 my-user-card">
            {{-- catch di errore --}}
            @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
            @endif
                <h1 class="text-center">
                    Lista degli ordini
                </h1>
                <hr>
                <!--Tabella visualizzazione contenuti table orders-->
                <table class="table">
                    <thead >
                        <tr>
                            <th scope="col">Cliente</th>
                            <th scope="col">Indirizzo</th>
                            <th scope="col" class="text-center">Data dell'ordine</th>
                            <th scope="col" class="text-center">Valore dell'ordine</th>
                            <th colspan="3" class="text-center"scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                                <tr>
                                    <th>
                                        {{ $order->name }} {{ $order->surname }}
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
                                    <td class="text-center">
                                        <a href="{{ route('admin.orders.show', ['order' => $order->id]) }}" class="btn btn-xs btn-primary me-2 fw-bolder">
                                            Vedi ordine
                                        </a>
                                    </td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection
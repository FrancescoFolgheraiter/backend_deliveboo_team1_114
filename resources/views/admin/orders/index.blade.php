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
                <h4>Filtra gli ordini</h4>
                <form action="{{ route('admin.orders.index') }}" method="GET" class="d-flex justify-content-around ">
                    <div>
                        <label for="">Da:</label>
                        <input type="date" id="from_date" name="from_date" >
                        @error('from_date')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <label for="">a:</label>
                        <input type="date" id="to_date" name="to_date">
                        @error('to_date')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit">Filtra</button>
                    </div>
                </form>
                <div class="custom-card-table-index">
                    <!--Tabella visualizzazione contenuti table orders-->
                    <table class="table">
                        <thead >
                            <tr>
                                <th scope="col" class="text-center">Cliente</th>
                                <th scope="col" class="text-center">Indirizzo</th>
                                <th scope="col" class="text-center">Data dell'ordine</th>
                                <th scope="col" class="text-center">Valore dell'ordine</th>
                                <th colspan="3" class="text-center"scope="col">Azioni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                    <tr>
                                        <th class="text-center">
                                            {{ $order->name }} {{ $order->surname }}
                                        </th>
                                        <td class="text-center">
                                            {{ $order->address }}
                                        </td>
                                        <td class="text-center">
                                            {{ date('d-m-Y', strtotime($order->date)) }} alle {{ date('H:i:s', strtotime($order->date)) }} 
                                        </td>
                                        <td class="text-center">
                                            {{ $order->total_price }} €
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.orders.show', ['order' => $order->id]) }}" class="btn btn-xs btn-color btn-outline-danger text-white me-2 fw-bolder">
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
</div>



@endsection
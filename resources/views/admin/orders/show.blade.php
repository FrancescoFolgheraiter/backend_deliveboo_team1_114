@extends('layouts.app')

@section('page-title', 'Ordine')

@section('main-content')
    <div class="row">
        <div class="col-9">
            <div class="card my-order-card">
                <div class="card-body d-flex justify-content-center">
                    <div class="row w-100">
                        <div class="col-md-9 col-12 d-flex w-100">
                            <div class="flex-grow-1">
                                <div>
                                    <h2 class="text-center text-shadow mb-3">
                                        Piatti ordinati
                                    </h2>
                                    <div class="d-flex justify-content-center">
                                        <button id="toggler-aside" class="navbar-toggler d-lg-none badge mb-3 btn-color text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#offCanvasOrder" aria-controls="offCanvasOrder" aria-label="Toggle navigation">
                                            Visualizza dettagli cliente
                                        </button>
                                    </div>
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
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offCanvasOrder" aria-labelledby="offCanvasOrderLabel">
            <div class="offcanvas-header">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body d-flex flex-column justify-content-center">
                <div class="my-user-card p-1">
                    <div class="mt-4 text-center">
                        <div class="text-center my-3">
                            <h3>
                                <span class="text-white text-shadow fw-bolder">{{ $order->name }} {{ $order->surname }}</span>
                            </h3>  
                        </div>
                        <div class="mb-5">
                            @if ($order->processed==0)
                            <form action="{{ route('admin.orders.update', ['order' => $order->id]) }}" method="POST"> 
                                @csrf
                                @method('PUT')
                                <button  type="submit"  class="btn text-white fw-bolder btn-outline-danger bg-color">
                                    Evadi ordine
                                </button>
                            </form>
                            @endif
                        </div>
                        <div class="mt-4 text-center">
                            <div class="mb-2">
                                <h5 class="mb-2">
                                    Ordinato il
                                </h5>
                                <h4 class="text-white text-shadow fw-bolder">
                                    {{ date('d-m-Y', strtotime($order->date)) }}
                                </h4>
                            </div>
                            <div class="mb-5">
                                <h5 class="mb-2">
                                    Alle ore
                                </h5>
                                <h4 class="text-white text-shadow fw-bolder">
                                    {{ date('H:i:s', strtotime($order->date)) }}
                                </h4>
                            </div>
                        </div>                 
                        <div class="mb-4">
                            <div>
                                <h5 class="mb-2">
                                    Indirizzo dell'ordine
                                </h5>
                                <h4 class="text-white text-shadow fw-bolder">
                                    {{ $order->address }}
                                </h4>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div>
                                <h5 class="mb-2">
                                    Numero di telefono
                                </h5>
                                <h4 class="text-white text-shadow fw-bolder">
                                    +39 {{ $order->phone_number }}
                                </h4>
                            </div>
                        </div>
                        <div>
                            <div class="mb-5">
                                <h5 class="mb-2">
                                    Valore dell'ordine
                                </h5>
                                <h4 class="text-white text-shadow fw-bolder">
                                    {{ $order->total_price }} €
                                </h4>
                            </div>
        
                            <div class="m-5">
                                <h5>
                                    Note lasciate dal cliente
                                </h5>
                                @if (!empty($order->note))
                                    <h5 class="text-white text-shadow fw-bolder">
                                        {{ $order->note }}
                                    </h5>
                                @else
                                    <p class="text-white">Il cliente non ha lasciato note.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3">
            
            <div class="card my-user-card d-flex flex-column align-items-center justify-content-center">
                <div class="custom-card-order text-center">
                    <div class="text-center my-3">
                        <h3>
                            <span class="text-color-3 text-shadow fw-bolder">{{ $order->name }} {{ $order->surname }}</span>
                        </h3>  
                    </div>
                    <div class="mb-2">
                        @if ($order->processed==0)
                        <form action="{{ route('admin.orders.update', ['order' => $order->id]) }}" method="POST"> 
                            @csrf
                            @method('PUT')
                            <button  type="submit"  class="btn text-white fw-bolder btn-outline-danger bg-color">
                                Evadi ordine
                            </button>
                        </form>
                        @endif
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
                            <button id="toggler-aside" class="btn text-white fw-bolder btn-outline-danger bg-color" type="button" data-bs-toggle="offcanvas" data-bs-target="#offCanvasNotes" aria-controls="offCanvasNotes" aria-label="Toggle navigation">
                                Note lasciate dal cliente
                            </button>
                            <div class="offcanvas offcanvas-end" tabindex="-1" id="offCanvasNotes" aria-labelledby="offCanvasNotesLabel">
                                <div class="offcanvas-header">
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>
                                <div class="offcanvas-body d-flex flex-column justify-content-center">
                                    <div class="my-aside-card">
                                        <div class="d-flex justify-content-center flex-column">
                                            <div class="text-center">
                                                <div class="mb-5">
                                                    <div class="mb-5">
                                                        @if (!empty($order->note))
                                                            <h5 class="text-white text-shadow fw-bolder">
                                                                {{ $order->note }}
                                                            </h5>
                                                        @else
                                                            <p class="text-white">Il cliente non ha lasciato note.</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

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
                <h1 class="text-center mb-4">
                    Lista degli ordini
                </h1>
                <div class="filter">
                    <div  id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header text-center">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFilter" aria-expanded="true" aria-controls="collapseFilter">
                                    <h4 class="text-dark ms-3">
                                        <a href="#" class="text-color-2"><i class="fa-solid fa-filter"></i> Filtra gli ordini</a> 
                                    </h4>
                                </button>
                            </h2>
                            <div id="collapseFilter" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    {{-- form per il filtraggio di ordini, reindirizza alla rotta index del controller Order --}}
                                    <form id="filterForm" action="{{ route('admin.orders.index') }}" method="GET" class="d-flex flex-column align-items-center mb-3" onsubmit="return validateDates()">
                                        <div class="d-flex mb-2">
                                            <div class="m-3 d-flex flex-column">
                                                <label class="form-label text-center" for="from_date">Da:</label>
                                                <input type="date" id="from_date" class="form-control" name="from_date" required required value="{{ isset($date['from_date']) ? $date['from_date'] : '' }}" max="{{ date('Y-m-d') }}">
                                                @error('from_date')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="m-3 d-flex flex-column">
                                                <label class="form-label text-center" for="to_date">a:</label>
                                                <input type="date" id="to_date" class="form-control" name="to_date" required value="{{ isset($date['to_date']) ? $date['to_date'] : '' }}" max="{{ date('Y-m-d') }}">
                                                @error('to_date')
                                                    <div class="alert alert-danger">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div>
                                            <button type="submit" class="btn btn-color btn-outline-danger text-white" data-bs-toggle="modal" data-bs-target="#customModal">Filtra</button>
                                            <button type="reset" class="btn btn-color btn-outline-danger text-white" onclick="resetForm()">Clear</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
        <div class="modal fade" id="customModal" tabindex="-1" aria-labelledby="customModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-color-2" id="customModalLabel">ATTENZIONE!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="closeModal()" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p id="errorMessage"></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-color btn-outline-danger text-white" data-bs-dismiss="modal" onclick="closeModal()">Chiudi</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    //script che mi permette di resettare la query 
    function resetForm() {
        document.getElementById("filterForm").reset();
        window.location.href = "{{ route('admin.orders.index') }}";
    }
    //funzione che mi permette di mostrare un messaggio e di selezionare 
    // il modal
    function showModal(message) {
        document.getElementById('errorMessage').innerHTML = message;
        document.getElementById('customModal').classList.add('show');
        document.getElementById('customModal').style.display = 'block';
    }
    //funzione che mi permette di chiudere il modal tramite button o X
    function closeModal() {
        document.getElementById('customModal').classList.remove('show');
        document.getElementById('customModal').style.display = 'none';
    }
    //script che mi permette una validazione front end per esperienza utente
    //che il filtraggio delle date sia fatto bene
    function validateDates() {
        var fromDate = new Date(document.getElementById('from_date').value);
        var toDate = new Date(document.getElementById('to_date').value);
        var today = new Date();

        if (fromDate > today || toDate > today) {
            showModal('Le date non possono superare la data odierna.');
            return false;
        }

        if (fromDate > toDate) {
            showModal('La data di inizio non può essere successiva alla data di fine.');
            return false;
        }
        return true;
    }
</script>

@endsection
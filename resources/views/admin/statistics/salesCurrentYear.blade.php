
@extends('layouts.app')

@section('page-title', 'Statistiche dei tuoi ordini')

@section('main-content')

<div class="row">
    <div class="col">
        <div class="custom-container">
            <div class="custom-card-stats d-flex align-items-center flex-column p-3">
                {{-- catch di errore --}}
                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                    <h1 class="text-center">
                        Statistiche
                    </h1>
                    <!--Grafico vendite 2024-->
                    <div class="m-auto">
                        {!! $chart->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection


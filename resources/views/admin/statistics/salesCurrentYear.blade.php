
@extends('layouts.app')

@section('page-title', 'Statistiche dei tuoi ordini')

@section('main-content')

<div class="row">
    <div class="col">
        <div class="card p-2">
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
                <div class=" m-auto ">
                    {!! $chart->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>


{{-- <div style="width: 800px;">
    <canvas id="acquisitions"></canvas>
</div> --}}





<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection

{{-- <script>
    document.addEventListener('DOMContentLoaded', function () {
    const data = [
        { year: 2010, count: 10 },
        { year: 2011, count: 20 },
        { year: 2012, count: 15 },
        { year: 2013, count: 25 },
        { year: 2014, count: 22 },
        { year: 2015, count: 30 },
        { year: 2016, count: 28 },
    ];

    new Chart(
        document.getElementById('acquisitions'),
        {
            type: 'line',
            data: {
                labels: data.map(row => row.year),
                datasets: [
                    {
                        label: 'Acquisitions by year',
                        data: data.map(row => row.count)
                    }
                ]
            }
        }
    );
});
</script> --}}

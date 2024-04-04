
@extends('layouts.app')

@section('page-title', 'Statistiche dei tuoi ordini')

@section('main-content')

<h1>
    Statistiche
</h1>

{{-- <div style="width: 800px;">
    <canvas id="acquisitions"></canvas>
</div> --}}

{{-- example.blade.php --}} 

<div style="width:75%;">
    {!! $chartjs->render() !!}
</div>

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

@extends('layouts.app')

@section('page-title', 'Tutti i piatti')

@section('main-content')
<div class="row">
    <div class="col">
        <div class="card p-2">
            <div class="car-body">
                <h1 class="text-center">
                    Lista dei piatti
                </h1>
                <hr>
                <!--Tabella visualizzazione contenuti table dishes-->
                <table class="table">
                    <thead >
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Ingredienti</th>
                            <th scope="col" class="text-center">Prezzo</th>
                            <th scope="col" class="text-center">Piatto disponibile</th>
                            <th colspan="3" class="text-center"scope="col">Azioni</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user->dishes as $dish)
                                <tr>
                                    <th scope="row">
                                        {{ $dish->name }}
                                    </th>
                                    <td>
                                        {{ $dish->ingredients }}
                                    </td>
                                    <td class="text-center">
                                        {{ $dish->price }}
                                    </td>
                                    <td class="text-center">
                                        @if ($dish->visible == 0)
                                            <span class="badge rounded-pill text-bg-danger">No</span>  
                                        @else
                                            <span class="badge rounded-pill text-bg-success">Si</span>  
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.dishes.show', ['dish' => $dish->id]) }}" class="btn btn-xs btn-primary me-2">
                                            Vedi
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.dishes.edit', ['dish' => $dish->id]) }}" class="btn btn-warning me-2">
                                            Modifica
                                        </a>
                                    </td>
                                    <td>
                                        <form onsubmit="return confirm('Sei sicuro di voler eliminare questa voce?');"  action="{{ route('admin.dishes.destroy', ['dish' => $dish->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                                <button type="submit" class="btn btn-danger">
                                                    Elimina
                                                </button>
                                            @error('name')
                                                <div class="alert alert-danger">
                                                        {{ $message }}
                                                </div>
                                            @enderror
                                        </form>
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
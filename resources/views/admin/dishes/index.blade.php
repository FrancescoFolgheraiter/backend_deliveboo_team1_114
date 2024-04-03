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
                            @if ($dish->delete == null)
                            {{-- stampo solo nel caso delete non sia valorizzata //soft delete --}}
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
                                        <a href="{{ route('admin.dishes.show', ['dish' => $dish->id]) }}" class="btn btn-xs btn-primary me-2 fw-bolder">
                                            Vedi
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.dishes.edit', ['dish' => $dish->id]) }}" class="btn btn-warning me-2 fw-bolder text-white">
                                            Modifica
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn fw-bolder btn-danger" data-bs-toggle="modal" data-bs-target="#DishModal{{ $dish->id }}">
                                            Elimina
                                        </a>
                                    
                                        <div class="modal fade" id="DishModal{{ $dish->id }}" tabindex="-1" aria-labelledby="DishModalLabel{{ $dish->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="DishModalLabel{{ $dish->id }}"><span class="text-danger">Eliminazione</span> del piatto {{ $dish->name }}</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Sei sicuro di voler eliminare {{ $dish->name }}?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-dark fw-bolder" data-bs-dismiss="modal">Annulla</button>
                                                        <form action="{{ route('admin.dishes.destroy', ['dish' => $dish->id]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger fw-bolder">
                                                                Elimina
                                                            </button>
                                                            @error('name')
                                                                <div class="alert alert-danger">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>                                
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



@endsection
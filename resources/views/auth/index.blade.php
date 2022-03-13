@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Utenti registrati</div>

                    <div class="search px-4">
                        <form class="d-flex mt-4" action="{{ route('users.index') }}" method="GET">
                            <button type="submit" class="btn btn-success mr-2 btnP">Cerca</button>
                            <div>
                                @csrf
                                <input type="text" class="form-control my_input_text" name="query"
                                    placeholder="Inserisci nome ristorante">
                            </div>
                        </form>
                        @if (isset($query))
                            <div class="query d-flex mt-4">Risultati per:
                                <div class="badge badge-pill badge-secondary ml-2 d-flex align-items-center my_grey_pill">
                                    <a href="{{route('users.index')}}" class="text-body text-decoration-none d-inline-block mr-1 clear-query">
                                        x
                                    </a>
                                    {{ $query }}
                                </div>
                            </div>
                        @endif
                    </div>

                    @if (count($users) > 0)
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Nome ristorante</th>
                                        <th scope="col">Indirizzo</th>
                                        <th scope="col">Telefono</th>
                                        <th scope="col">Partita iva</th>
                                        <th scope="col">Azioni</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->address }}</td>
                                            <td>{{ $user->telephone }}</td>
                                            <td>{{ $user->p_iva }}</td>
                                            <td>
                                                <button type="button" class="btn btn-info"><a class="text-white"
                                                        href="{{ route('users.show', $user->id) }}">Visualizza</a></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="mx-4 mt-3 py-3 border-top my_grey_border">Nessun risultato trovato.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

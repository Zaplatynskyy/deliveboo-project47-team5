@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Utenti registrati</div>

                    {{-- <div class="search">
                        <input type="text" class="form-control id="name"
                            placeholder="Cerca utente">
                    </div> --}}

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
                </div>
            </div>
        </div>
    </div>
@endsection

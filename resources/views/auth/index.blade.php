@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="card">
                    <h3 class="card-header">Utenti registrati</h3>

                    <div class="card-header search mb-3">
                        <form class="d-flex" action="{{ route('users.index') }}" method="GET">
                            <button type="submit" class="my_btn btn btn-success mr-2 btnP">Cerca</button>
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
                        @foreach ($users as $user)
                            <div class="card-body mb-3">
                                <h4>Utente #{{ $user->id }}</h4>

                                <div class="row_info">
                                    <div class="label">Nome Attività</div>
                                    <div class="my_txt name_order">
                                        <span>{{ $user->name }}</span>
                                        {{-- <span>{{ $order->cognome }}</span> --}}
                                    </div>
                                </div>

                                <div class="row_info">
                                    <div class="label">Indirizzo</div>
                                    <div class="my_txt address">{{ $user->address }}</div>
                                </div>

                                <div class="row_info">
                                    <div class="label d-flex justify-content-between">
                                        <span>Telefono</span>
                                        <span>P. IVA</span>
                                    </div>
                                    <div class="my_txt telephone_price d-flex justify-content-between">
                                        <span>{{ $user->telephone }}</span>
                                        <span>{{ $user->p_iva }}</span>
                                    </div>
                                </div>
                                
                                <div class="buttons d-flex justify-content-between mt-3">
                                    <button type="button" class="btn btn-info"><a class="text-white"
                                        href="{{ route('users.show', $user->id) }}">Visualizza</a></button>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="mx-4 mt-3 py-3 border-top my_grey_border">Nessun risultato trovato.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

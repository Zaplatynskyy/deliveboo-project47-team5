@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <h4>Ordini accettati</h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Cognome</th>
                                    <th scope="col">Indirizzo</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Totale</th>
                                    <th scope="col">Azioni</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ordersApproved as $order)
                                    <tr>
                                        <th>{{ $order->name }}</th>
                                        <th>{{ $order->cognome }}</th>
                                        <th>{{ $order->address }}</th>
                                        <th>{{ $order->telephone }}</th>
                                        <th>{{ $order->total }}€</th>
                                        <th>
                                            <button type="button" class="btn btn-info"><a class="text-white"
                                                    href="{{ route('orders.show', $order->id) }}">Visualizza</a></button>
                                        </th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="card-body">
                        <h4>Ordini rifiutati</h4>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Cognome</th>
                                    <th scope="col">Indirizzo</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Totale</th>
                                    <th scope="col">Azioni</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ordersNotApproved as $order)
                                    <tr>
                                        <th>{{ $order->name }}</th>
                                        <th>{{ $order->cognome }}</th>
                                        <th>{{ $order->address }}</th>
                                        <th>{{ $order->telephone }}</th>
                                        <th>{{ $order->total }}€</th>
                                        <th>
                                            <button type="button" class="btn btn-info"><a class="text-white"
                                                    href="{{ route('orders.show', $order->id) }}">Visualizza</a></button>
                                        </th>
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

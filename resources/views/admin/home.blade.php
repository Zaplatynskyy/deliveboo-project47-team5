@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Ordini in arrivo</div>

                    <div class="card-body">
                        @if (count($orders) > 0)
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

                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->name }}</td>
                                            <td>{{ $order->cognome }}</td>
                                            <td>{{ $order->address }}</td>
                                            <td>{{ $order->telephone }}</td>
                                            <td>{{ $order->total }}€</td>
                                            <td>
                                                <button type="button" class="btn btn-info mt-1"><a class="text-white"
                                                        href="{{ route('orders.show', $order->id) }}">Visualizza</a></button>
                                                <form action="{{ route('orders.approves', $order->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit"
                                                        class="my_btn btn btn-success mt-1 text-white">Approva</button>
                                                </form>
                                                <form action="{{ route('orders.disapproves', $order->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="my_btn btn btn-danger mt-1">Annulla</button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        @else
                            <p>Non ci sono nuovi ordini</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

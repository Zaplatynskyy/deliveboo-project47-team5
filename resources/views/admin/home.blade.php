@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6 list_order">
                <div class="card">
                    <h3 class="card-header">Ordini in arrivo</h3>
                    <div class="card_orders">
                        @if (count($orders) > 0)
                            @foreach ($orders as $order)
                                <div class="card-body my-4">
                                    <h4>Ordine #{{ $order->id }}</h4>

                                    <div class="row_info">
                                        <div class="label">Cliente</div>
                                        <div class="my_txt name_order">
                                            <span>{{ $order->name }}</span>
                                            <span>{{ $order->cognome }}</span>
                                        </div>
                                    </div>

                                    <div class="row_info">
                                        <div class="label">Indirizzo</div>
                                        <div class="my_txt address">{{ $order->address }}</div>
                                    </div>

                                    <div class="row_info">
                                        <div class="label d-flex justify-content-between">
                                            <span>Telefono</span>
                                            <span>Importo</span>
                                        </div>
                                        <div class="my_txt telephone_price d-flex justify-content-between">
                                            <span>{{ $order->telephone }}</span>
                                            <span>{{ $order->total }}€</span>
                                        </div>
                                    </div>
                                    
                                    <div class="buttons d-flex justify-content-between mt-3">
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
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="card-body">
                                <p>Non ci sono nuovi ordini</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        Ordini nell'ultimo mese
                    </div>
    
                    <div class="card-body">
                        <canvas id="popChart" width="600" height="400"></canvas>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        Piatti ordinati nell'ultimo mese
                    </div>
    
                    <div class="card-body">
                        <canvas id="foodChart" width="600" height="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

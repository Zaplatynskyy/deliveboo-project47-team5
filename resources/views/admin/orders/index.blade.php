@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="card-header">Lista degli ordini</h3>
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6 mt-4 list_order_not_null">
                <div class="card">
                    
                    <div class="card-header">
                        <h4>Ordini accettati:</h4>
                    </div>
                    <div class="card_orders">
                        @if (count($ordersApproved) > 0)
                            @foreach ($ordersApproved as $order)
                                <div class="card-body mb-3">
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
                                        <button type="button" class="btn btn-info"><a class="text-white"
                                            href="{{ route('orders.show', $order->id) }}">Visualizza</a></button>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="card-body">
                                <div>Al momento non hai ordini approvati</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6 mt-4 list_order_not_null">
                <div class="card">
                    <div class="card-header">
                        <h4>Ordini rifiutati:</h4>
                    </div>
                    <div class="card_orders">
                        @if (count($ordersNotApproved) > 0)
                            @foreach ($ordersNotApproved as $order)
                                <div class="card-body mb-3">
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
                                        <button type="button" class="btn btn-info"><a class="text-white"
                                            href="{{ route('orders.show', $order->id) }}">Visualizza</a></button>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="card-body">
                                <div>Al momento non hai ordini non approvati</div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

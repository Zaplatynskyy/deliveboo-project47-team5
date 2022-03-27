@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-uppercase mb-0">{{ $order->name }} {{ $order->cognome }}</h3>
                    </div>
                    <div class="card-body">
                        <div class="order">
                            <div class="row_info">
                                <div class="label">Stato ordine</div>
                                <div class="my_txt name_order">
                                    @if ($order->accepted === 1)
                                        <span class="badge badge-success">Ordine accettato</span>
                                    @elseif ($order->accepted === 0)
                                        <span class="badge badge-danger">Ordine non accettato</span>
                                    @else
                                        <span class="badge badge-info text-white">Ordine in attesa</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row_info">
                                <div class="label">Indirizzo</div>
                                <div class="my_txt name_order">
                                    <span>{{ $order->address }}</span>
                                </div>
                            </div>

                            <div class="row_info">
                                <div class="label">Email</div>
                                <div class="my_txt name_order">
                                    <span>{{ $order->email }}</span>
                                </div>
                            </div>

                            <div class="row_info">
                                <div class="label">Telefono</div>
                                <div class="my_txt name_order">
                                    <span>{{ $order->telephone }}</span>
                                </div>
                            </div>

                            <div class="row_info">
                                <div class="label">Totale ordine</div>
                                <div class="my_txt name_order">
                                    <span>{{ $order->total }}€</span>
                                </div>
                            </div>

                            <div class="row_info">
                                <div class="label">Dettagli ordine</div>
                                <div class="my_txt name_order">
                                    @foreach ($order->foods as $food)
                                            <div class="order_list">
                                                <span class="my_food_list mr-2">
                                                    {{ $food->name }}
                                                </span>
                                                <span>
                                                    x{{ $food->pivot->quantity }}
                                                </span>
                                            </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="buttons mt-4 d-flex">
                                @if ($order->accepted === null)
                                    <form action="{{ route('orders.approves', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="my_btn btn btn-success ">Approva</button>
                                    </form>
                                    <form action="{{ route('orders.disapproves', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="my_btn btn btn-danger mx-1">Annulla</button>
                                    </form>
                                @endif
                                <button type="button" class="btn btn-info"><a class="text-white"
                                        href="{{ url()->previous() }}">Indietro</a></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

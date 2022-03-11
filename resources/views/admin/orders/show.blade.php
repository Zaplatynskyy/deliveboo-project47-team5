@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-uppercase mb-0">{{ $order->name }} {{ $order->cognome }}</h2>
                    </div>
                    <div class="card-body">
                        <div class="order">
                            <p class="my-4"><span class="my_bold">Indirizzo:</span> {{ $order->address }}
                            </p>
                            <p class="my-4"><span class="my_bold">Telefono:</span>
                                {{ $order->telephone }}</p>
                            <p class="my-4"><span class="my_bold">Totale ordine:</span>
                                {{ $order->total }}€</p>
                            @if ($order->accepted === 1)
                                <span class="badge badge-success">Ordine accettato</span>
                            @elseif ($order->accepted === 0)
                                <span class="badge badge-danger">Ordine non accettato</span>
                            @else
                                <span class="badge badge-info text-white">Ordine in attesa</span>
                            @endif
                            @if ($order->type)
                                <span class="badge badge-info">{{ $order->type->name }}</span>
                            @endif
                            <h5 class="mt-4">Dettagli ordine:</h5>
                            <ul class="my-4">
                                @foreach ($order->foods as $food)
                                    <li>{{ $food->name }}<span
                                            class="ml-5">x{{ $food->pivot->quantity }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="buttons mt-4 d-flex">
                            @if ($order->accepted === null)
                                <form action="{{ route('orders.approves', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success ">Approva</button>
                                </form>
                                <form action="{{ route('orders.disapproves', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-danger mx-1">Annulla</button>
                                </form>
                            @endif
                            <button type="button" class="btn btn-info"><a class="text-white"
                                    href="{{ url()->previous() }}">Torna alla lista</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

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
                            <p class="my-4">{{ $order->address }}</p>
                            <p class="my-4">{{ $order->telephone }}</p>
                            <p class="my-4">{{ $order->total }}€</p>
                            <span
                                class="badge {{ $order->accepted ? 'badge-success' : 'badge-danger' }}">{{ $order->accepted ? 'Ordine accettato' : 'Ordine non accettato' }}</span>
                            @if ($order->type)
                                <span class="badge badge-info">{{ $order->type->name }}</span>
                            @endif
                            {{-- @if (count($order->tags) > 0)
                                <h5 class="mt-3">Tags:</h5>
                                @foreach ($order->tags as $tag)
                                    <span class="badge badge-primary">{{ $tag->name }}</span>
                                @endforeach
                            @endif --}}
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
                                    href="{{ route('orders.index') }}">Back to the list</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

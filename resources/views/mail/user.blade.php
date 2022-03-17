<h3>Nuovo ordine</h3>
<a href="{{route('orders.show', $order->id)}}">
    <button type="button" class="btn btn-primary">Visualizza</button>
</a>
<h3>Riepilogo Ordine</h3>

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
            <h5 class="mt-4">Dettagli ordine:</h5>
            <ul class="my-4">
                @foreach ($order->foods as $food)
                    <li>
                        <span class="my_food_list">
                            {{ $food->name }}
                        </span>
                        <span>
                            x{{ $food->pivot->quantity }}
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
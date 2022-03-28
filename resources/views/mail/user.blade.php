<html>
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
        <style>
            body{
                font-family: 'Lato', sans-serif;
            }
            h1 {
                color: #3ECCBC;
            }

            h2{
                font-weight: normal
            }

            .card{
                text-align: center
            }

            .btn{
                border: none;
                padding: 15px;
                background-color: #3ECCBC;
                border-radius: 10px;
                cursor: pointer;
                color: white;
                
            }
            li{
                list-style: none;
            }
        </style>
    </head>
    <body>
        
<div class="card">
    <div class="card-header">
        <h1>Hai ricevuto un nuovo ordine!</h1>

        <h2 class="text-uppercase mb-0">Cliente: <strong>{{ $order->name }} {{ $order->cognome }}</strong></h2>
    </div>
    <div class="card-body">
        <div class="order">
            <p class="my-4"><span class="my_bold">Indirizzo: </span><strong>{{ $order->address }}</strong>
            </p>
            <p class="my-4"><span class="my_bold">Telefono: </span>
                <strong>{{ $order->telephone }}</strong></p>
            <p class="my-4"><span class="my_bold">Totale ordine: </span>
             <strong>{{ $order->total }} €</strong></p>
            <h3 class="mt-4">Dettagli ordine:</h3>
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
    <a href="{{route('orders.show', $order->id)}}">
        <button type="button" class="btn">Visualizza nel Web</button>
    </a>
</div>
    </body>
</html>
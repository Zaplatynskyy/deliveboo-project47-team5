<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Food;
use App\Order;

class OrderController extends Controller
{

    public function generate(Request $request, Gateway $gateway)
    {
        $token = $gateway->clientToken()->generate();

        $data = [
            'success' => true,
            'token' => $token
        ];

        return response()->json($data, 200);
    }

    public function makePayment(Request $request, Gateway $gateway)
    {

        $data = $request->all();
        $total = 0;
        $foods = $data['foods'];
        $food = Food::find($foods[0]['id']);
        $user = $food->user;

        foreach ($foods as $food) {
            $total += Food::find($food['id'])->price * $food['quantity'];
        }

        $result = $gateway->transaction()->sale([
            'amount' => $total,
            'paymentMethodNonce' => $data['tokenClient'],
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {

            $newOrder = new Order();

            $newOrder->name = $data['client']['name'];
            $newOrder->cognome  = $data['client']['cognome'];
            $newOrder->address = $data['client']['address'];
            $newOrder->telephone = $data['client']['telephone'];
            $newOrder->total = $total;
            $newOrder->user_id = $user->id;
            $newOrder->save();

            foreach ($foods as $food) {
                $newOrder->foods()->attach($food["id"], ['quantity' => $food["quantity"]]);
            }

            $data = [
                'success' => true,
                'message' => "Transazione eseguita con Successo!"
            ];
            return response()->json($data, 200);
        } else {
            $data = [
                'success' => false,
                'message' => "Transazione Fallita!!"
            ];
            return response()->json($data, 401);
        }
    }
}

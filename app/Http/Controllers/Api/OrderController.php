<?php

namespace App\Http\Controllers\Api;

use App\Food;
use App\Order;
use Braintree\Gateway;
use App\Mail\ClienMail;
use App\Mail\OrderMail;
use App\Rules\ValidOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'tokenClient' => ['required'],
            'foods' => ['required', new ValidOrder],
            'client.name' => ['required', 'string', 'max:100'],
            'client.cognome' => ['required', 'string', 'max:100'],
            'client.email' => ['required', 'string', 'email', 'max:255'],
            'client.address' => ['required', 'string', 'max:255'],
            'client.telephone' => ['required', 'numeric', 'digits_between:8,11']
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "errors" => $validator->errors()
            ], 400);
        }

        $data = $request->all();


        $foods = $data['foods'];
        $food = Food::find($foods[0]['id']);
        $user = $food->user;

        $total = 0;

        if ($user->shipping) {
            $total += $user->shipping;
        }

        foreach ($foods as $food) {
            $total += Food::find($food['id'])->price * $food['quantity'];
        }

        if ($total < $user->min_price && $user->min_price) {
            return response()->json([
                "success" => false,
                "errors" => 'Per procedere devi acquistare un minimo di ' . $user->min_price
            ], 400);
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
            $newOrder->email = $data['client']['email'];
            $newOrder->telephone = $data['client']['telephone'];
            $newOrder->total = $total;
            $newOrder->user_id = $user->id;
            $newOrder->save();

            foreach ($foods as $food) {
                $newOrder->foods()->attach($food["id"], ['quantity' => $food["quantity"]]);
            }

            Mail::to($user->email)->send(new OrderMail($newOrder));
            Mail::to($newOrder->email)->send(new ClienMail($newOrder));

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

    public function month(Request $request)
    {

        $data = $request->all()['params'];
        
        $month = $data['month'];
        $userId = $data['userId'];


        if ($month < 10) $month = '0' . $month;

        $numberOfOrders = [];

        $days = cal_days_in_month(CAL_GREGORIAN, $month, date("Y"));

        for ($i = 1; $i <= $days; $i++) {
            if ($i < 10) $i = '0' . $i;
            $orders = Order::where('user_id', $userId)->where('created_at', 'like', '%' . '-' . $month . '-' . $i . '%')->where('accepted', 1)->get();
            $numberOfOrders[] = count($orders);
        }


        $data = [
            'success' => true,
            'orders' => $numberOfOrders
        ];
        return response()->json($data, 200);
    }
}

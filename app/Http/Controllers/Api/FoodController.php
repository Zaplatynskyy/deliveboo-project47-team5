<?php

namespace App\Http\Controllers\Api;

use App\Food;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
    public function month(Request $request)
    {
        $data = $request->all()['params'];
        
        $month = $data['month'];
        if ($month < 10) $month = '0' . $month;
        
        $userId = $data['userId'];




        // for ($i = 1; $i <= $days; $i++) {
        //     if ($i < 10) $i = '0' . $i;
        //     $orders = Order::where('created_at', 'like', '%' . '-' . $date . '-' . $i . '%')->where('accepted', 1)->get();
        //     $numberOfOrders[] = count($orders);
        // }


        $foods = Food::where('user_id', $userId)->whereHas('orders', function($query) use ($month){
            $query->where('orders.created_at', 'like', '%' . '-' . $month . '-' . '%');
        })->get();

        $ordersFoodsName = [];
        $ordersQuantity = [];

        foreach ($foods as $food) {
            $quantity = 0;

            foreach ($food->orders as $order) {
                $quantity = $quantity + $order->pivot->quantity;
            }
            $ordersFoodsName[] = $food->name;
            $ordersQuantity[] = $quantity;
        }

        $ordersData = [
            'names' => $ordersFoodsName,
            'quantities' => $ordersQuantity,
        ];


        $data = [
            'success' => true,
            'orders' => $ordersData
        ];
        return response()->json($data, 200);
    }
}

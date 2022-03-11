<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller


{
    public function index() 
    {

        $ordersApproved = Order::where('accepted', 1)->orderBy('created_at', 'desc')->get();
        $ordersNotApproved = Order::where('accepted', 0)->orderBy('created_at', 'desc')->get();

        return view('admin.orders.index', compact('ordersApproved', 'ordersNotApproved'));
    }

    public function show($id) 
    {
        $order = Order::find($id);
        return view('admin.orders.show', compact('order'));
    }

    public function update($id)
    {

        $order = Order::find($id);
        $order->accepted = true;
        $order->save();

        return redirect()->route('home');
    }

    public function disapproves($id)
    {
        $order = Order::find($id);
        $order->accepted = false;
        $order->save();

        return redirect()->route('home');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('home');

    }
}

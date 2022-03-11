<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller


{
    public function index()
    {

        $ordersApproved = Order::where('accepted', 1)->where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        $ordersNotApproved = Order::where('accepted', 0)->where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('admin.orders.index', compact('ordersApproved', 'ordersNotApproved'));
    }

    public function show($id)
    {
        $order = Order::find($id);
        if (Auth::id() == $order->user->id) {
            return view('admin.orders.show', compact('order'));
        } else {
            return redirect()->route('home');
        }
    }

    public function update($id)
    {
        $order = Order::find($id);
        if (Auth::id() == $order->user->id) {
            $order->accepted = true;
            $order->save();
        }
        return redirect()->route('home');
    }

    public function disapproves($id)
    {
        $order = Order::find($id);
        if (Auth::id() == $order->user->id) {
            $order->accepted = false;
            $order->save();
        }
        return redirect()->route('home');
    }

    public function destroy(Order $order)
    {
        if (Auth::id() == $order->user->id) {
            $order->delete();
        }
        return redirect()->route('home');
    }
}

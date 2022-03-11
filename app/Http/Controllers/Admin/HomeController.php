<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $orders = Order::where('accepted', null)->orderBy('created_at', 'desc')->get();
        return view('admin.home', compact('orders'));
    }
}

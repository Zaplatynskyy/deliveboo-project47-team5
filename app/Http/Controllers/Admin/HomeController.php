<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::user()->email == 'admin@admin.com') {
            return redirect()->route('users.index');
        } else {
            $orders = Order::where('accepted', null)->orderBy('created_at', 'desc')->get();
            return view('admin.home', compact('orders'));
        }
    }
}

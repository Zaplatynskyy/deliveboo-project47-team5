<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class NotAuthController extends Controller
{
    public function notAuth() {
        
        return view('admin.notAuth');
    }
}

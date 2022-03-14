<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function search($query){
        $restaurants = User::where('email', '!=', 'admin@admin.com')->where('name', 'like', '%' . $query . '%')->get();

        $data = [
            'success'=>true,
            'restaurants'=>$restaurants,
        ];
            
        

        return response()->json($data,200);
    }
}

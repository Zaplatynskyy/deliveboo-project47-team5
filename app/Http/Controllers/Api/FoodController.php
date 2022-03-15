<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Food;

class FoodController extends Controller
{
    public function index($id)
    {
        $foods = Food::where('user_id', $id)->with(['type', 'tags'])->get();

        $data = [
            'success'=>true,
            'foods'=>$foods,
        ];
            
        

        return response()->json($data,200);
    }

}

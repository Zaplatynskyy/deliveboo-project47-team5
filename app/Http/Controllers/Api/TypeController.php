<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Type;

class TypeController extends Controller
{
    public function index()
    {
        $types = Type::all();

        $data = [
            'success'=>true,
            'types'=>$types,
        ];
            
        

        return response()->json($data,200);
    }

    public function show($slug)
    {
        $types = Type::where('slug', $slug)->with(['foods' =>function($query){
            $query->with('tags');
        }])->first();


        if (empty($types)) {
            return response()->json(['message' => 'page not found'], 404);
        }

        $data = [
            'success'=>true,
            'types'=>$types,
        ];

        return response()->json($data,200);
    }
}

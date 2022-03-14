<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        $data = [
            'success'=>true,
            'tags'=>$tags,
        ];
            
        

        return response()->json($data,200);
    }

    public function show($slug)
    {
        $tags = Tag::where('slug', $slug)->with(['foods' =>function($query){
            $query->with('type');
        }])->first();


        if (empty($tags)) {
            return response()->json(['message' => 'page not found'], 404);
        }

        $data = [
            'success'=>true,
            'tags'=>$tags,
        ];

        return response()->json($data,200);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\User;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();

        $data = [
            'success'=>true,
            'categories'=>$categories,
        ];
            
        

        return response()->json($data,200);
    }

    public function show($slug)
    {
        $categories = Category::where('slug', $slug)->with(['users' => function($query){
            $query->where('email', '!=', 'admin@admin.com')->with('categories');
        }])->first();


        if (empty($categories)) {
            return response()->json(['message' => 'page not found'], 404);
        }

        $data = [
            'success'=>true,
            'categories'=>$categories,
        ];

        return response()->json($data,200);
    }
}
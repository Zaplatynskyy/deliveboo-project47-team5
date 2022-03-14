<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function search($query)
    {
        $users = User::where('email', '!=', 'admin@admin.com')->where('name', 'like', '%' . $query . '%')->get();

        $data = [
            'success' => true,
            'users' => $users,
        ];



        return response()->json($data, 200);
    }
    public function advancedSearch(Request $request)
    {

        $filters = $request->all();
        if(isset($query)) {
            $query = $filters['params']['query'];
        } else {
            $query = '';
        }
        $categories = $filters['params']['categories'];
        $tags = $filters['params']['tags'];
        $users = User::where('email', '!=', 'admin@admin.com')->where('name', 'like', '%' . $query . '%');

        $filteredUsers = [];
        foreach ($users as $user) {
            foreach ($user->categories as $category) {
                if(in_array($category->id, $categories)) {
                    $filteredUsers[] = $user;
                }
            }
        }

        dd($filteredUsers);

        // 'foods' => function ($q) use ($tags) {
            //     $q->with(['tags' => function($secondQuery) use ($tags){
            //         $secondQuery->whereIn('slug', $tags);
            //     }]);
            // }

        $data = [
            'success' => true,
            'users' => $users,
        ];

        



        return response()->json($data, 200);
    }
}

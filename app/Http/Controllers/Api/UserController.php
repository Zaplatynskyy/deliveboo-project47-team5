<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use League\CommonMark\Util\ArrayCollection;

class UserController extends Controller
{

    public function index()
    {
        $users = User::where('email', '!=', 'admin@admin.com')->get()->random(2);

        return response()->json($users, 200);
    }

    public function search($query)
    {

        $users = User::where('email', '!=', 'admin@admin.com')->where('name', 'like', '%' . $query . '%')->with(['categories', 'foods' => function ($query) {
            $query->with('tags');
        }])->get();

        if (!count($users)) {
            return response()->json(["message" => "Nessun risultato trovato"], 404);
        }

        $data = [
            'success' => true,
            'users' => $users,
        ];

        return response()->json($data, 200);
    }
    public function advancedSearch(Request $request)
    {

        $filters = $request->all();
        if (isset($filters['params']['query'])) {
            $query = $filters['params']['query'];
        } else {
            $query = '';
        }
        $categories = $filters['params']['categories'];
        $tags = $filters['params']['tags'];

        switch ($filters['params']['order']) {
            case 'rilevanza':
                $users = User::where('email', '!=', 'admin@admin.com')->where('name', 'like', '%' . $query . '%')->with(['categories', 'foods' => function ($query) {
                    $query->with('tags');
                }])->get();

                if (!empty($query)) {
                    foreach ($users as $user) {
                        $counter = 0;
                        foreach ($user->foods as $food) {
                            if (str_contains($food->name, $query)) $counter++;
                        }
                        $user['relevance'] = $counter;
                    }
                }

                $users = $users->sortByDesc('relevance')->values();

                break;

            case 'costo consegna (basso-alto)':
                $users = User::where('email', '!=', 'admin@admin.com')->where('name', 'like', '%' . $query . '%')->with(['categories', 'foods' => function ($query) {
                    $query->with('tags');
                }])->orderBy('shipping', 'asc')->get();
                break;

            case 'costo consegna (alto-basso)':
                $users = User::where('email', '!=', 'admin@admin.com')->where('name', 'like', '%' . $query . '%')->with(['categories', 'foods' => function ($query) {
                    $query->with('tags');
                }])->orderBy('shipping', 'desc')->get();
                break;

            case 'ordine minimo (basso-alto)':
                $users = User::where('email', '!=', 'admin@admin.com')->where('name', 'like', '%' . $query . '%')->with(['categories', 'foods' => function ($query) {
                    $query->with('tags');
                }])->orderBy('min_price', 'asc')->get();
                break;

            case 'ordine minimo (alto-basso)':
                $users = User::where('email', '!=', 'admin@admin.com')->where('name', 'like', '%' . $query . '%')->with(['categories', 'foods' => function ($query) {
                    $query->with('tags');
                }])->orderBy('min_price', 'desc')->get();
                break;

            default:
                # code...
                break;
        }

        // $users = User::where('email', '!=', 'admin@admin.com')->where('name', 'like', '%' . $query . '%')->with(['categories', 'foods' => function($query){
        //     $query->with('tags');
        // }])->get();

        // filtro per categorie
        if (count($categories) > 0) {
            $filteredByCategoriesUsers = [];
            foreach ($users as $user) {
                $categoriesId = [];
                foreach ($user->categories as $category) {
                    $categoriesId[] = $category->id;
                }
                if (!array_diff($categories, $categoriesId) == $categories && !in_array($user, $filteredByCategoriesUsers) && count($categoriesId) > 0) {
                    $filteredByCategoriesUsers[] = $user;
                }
            }
            $users = $filteredByCategoriesUsers;
        }


        // filtro per tags
        if (count($tags) > 0) {
            $filteredByTagsUsers = [];
            foreach ($users as $user) {
                $tagsId = [];
                foreach ($user->foods as $food) {
                    foreach ($food->tags as $tag) {
                        if (!in_array($tag->id, $tagsId)) $tagsId[] = $tag->id;
                    }
                }
                if (!array_diff($tags, $tagsId) == $tags && !in_array($user, $filteredByTagsUsers) && count($tagsId) > 0) {
                    $filteredByTagsUsers[] = $user;
                }
            }
            $users = $filteredByTagsUsers;
        }


        if (!count($users)) {
            return response()->json(["message" => "Nessun risultato trovato"], 404);
        }

        // risposta al client
        $data = [
            'success' => true,
            'users' => $users,
        ];


        return response()->json($data, 200);
    }

    public function show($slug)
    {

        $user = User::where('slug', $slug)->with(['categories', 'foods' => function ($query) {
            $query->where('visible', 1)->orderBy('name', 'asc')->with(['type', 'tags']);
        }])->first();

        // risposta al client
        $data = [
            'success' => true,
            'user' => $user,
        ];

        return response()->json($data, 200);
    }
}

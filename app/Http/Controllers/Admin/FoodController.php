<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Food;
use App\Http\Controllers\Controller;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $validation = [
        'name' => 'required|string|max:100',
        'price' => 'required|numeric|between:0,999.99',
        'ingredients' => 'nullable',
        'visible' => 'sometimes|accepted',
        'type_id' => 'required|exists:types,id',
        'tags' => 'nullable|exists:tags,id',
        'image' => 'required|mimes:jpeg,jpg,bmp,png|max:2048'
    ];
    public function index()
    {
        $foods = Food::where('user_id', Auth::id())->orderBy('name', 'asc')->get();
        return view('admin.foods.index', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $tags = Tag::all();
        return view('admin.foods.create', compact('types', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $request->validate($this->validation);
        $newFood = new Food();
        $newFood->name = $data['name'];
        $newFood->price = $data['price'];
        $newFood->ingredients = $data['ingredients'];
        $newFood->visible = isset($data['visible']);
        $newFood->type_id = $data['type_id'];
        $newFood->user_id = Auth::id();

        if (isset($data['image'])) {
            $path = Storage::put('uploads', $data['image']);
            $newFood->image = $path;
        }

        $newFood->save();

        if (isset($data["tags"])) {
            $newFood->tags()->sync($data["tags"]);
        }

        return redirect()->route("foods.show", $newFood->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        if (Auth::id() == $food->user->id) {
            return view('admin.foods.show', compact('food'));
        } else {
            return response()->view('admin.notAuth');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {
        if (Auth::id() == $food->user->id) {
            $types = Type::all();
            $tags = Tag::all();
            return view('admin.foods.edit', compact('types', 'tags', 'food'));
        } else {
            return response()->view('admin.notAuth');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        $data = $request->all();

        $this->validation['image'] = 'mimes:jpeg,jpg,bmp,png|max:2048';

        $request->validate($this->validation);

        $food->name = $data['name'];
        $food->price = $data['price'];
        $food->ingredients = $data['ingredients'];
        $food->visible = isset($data['visible']);
        $food->type_id = $data['type_id'];

        if (isset($data['image'])) {
            Storage::delete($food->image);
            $path = Storage::put('uploads', $data['image']);
            $food->image = $path;
        }

        $food->save();

        if (isset($data["tags"])) {
            $food->tags()->sync($data["tags"]);
        } else {
            $food->tags()->detach();
        }

        return redirect()->route('foods.show', $food->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        $food->delete();

        if (isset($food->image)) {
            Storage::delete($food->image);
        }

        $previous = URL::previous();

        $url = '/admin/foods/' . $food->id;

        if (str_ends_with($previous, $url)) {
            return redirect()->route('foods.index');
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));
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

        $request->validate([
            'name' => 'required|unique:types|max:30'
        ]);

        $newType = new Type();
        $newType->name = $data['name'];
        $newType->slug = Str::of($newType->name)->slug('-');
        $newType->save();

        return redirect()->route('types.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $data = $request->all();

        $request->validate([
            'name' => "required|unique:types,name,{$type->id}|max:30"
        ]);

        $type->name = $data['name'];
        $type->slug = Str::of($type->name)->slug('-');
        $type->save();

        return redirect()->route('types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();

        $previous = URL::previous();

        $url = '/admin/types/'.$type->id;

        if (str_ends_with($previous, $url)) {
            return redirect()->route('types.index');
        }
    }
}

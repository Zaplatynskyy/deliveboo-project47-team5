<?php

namespace App\Http\Controllers\Admin;

use App\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
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
            'name' => 'required|unique:tags|max:30'
        ]);

        $newTag = new Tag();
        $newTag->name = $data['name'];
        $newTag->slug = Str::of($newTag->name)->slug('-');
        $newTag->save();

        return redirect()->route('tags.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $data = $request->all();

        $request->validate([
            'name' => "required|unique:tags,name,{$tag->id}|max:30"
        ]);

        $tag->name = $data['name'];
        $tag->slug = Str::of($tag->name)->slug('-');
        $tag->save();

        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        $previous = URL::previous();

        $url = '/admin/tags/'.$tag->id;

        if (str_ends_with($previous, $url)) {
            return redirect()->route('tags.index');
        }
    }
}

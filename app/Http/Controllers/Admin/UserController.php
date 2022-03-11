<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $categories = Category::all();
        return view('auth.edit', compact('user', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->all();

        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string', 'max:255'],
            'p_iva' => ['required', 'numeric', 'digits:11', "unique:users,p_iva,{$user->id}"],
            'telephone' => ['required', 'numeric', 'digits_between:8,11', "unique:users,telephone,{$user->id}"],
            'shipping' => ['nullable', 'numeric', 'between:00.90,99.90'],
            'min_price' => ['nullable', 'numeric', 'between:00.90,99.90'],
            'categories' => ['required', 'exists:categories,id'],
            'image' => ['mimes:jpeg,jpg,bmp,png', 'max:2048']
        ]);

        if($data['name'] != $user->name) {
            $user->name = $data['name'];
            $slug = Str::of($data['name'])->slug('-');
            $count = 1;

            if($slug != $user->slug) {
                while(User::where('slug', $slug)->first()) {
                    $slug = Str::of($data['name'])->slug('-').'-'.$count;
                    $count++;
                }
            }

            $user->slug = $slug;
        }

        if (isset($data['image'])) {
            $path = Storage::put('uploads', $data['image']);
            $user->image = $path;
        }

        $user->address = $data['address'];
        $user->p_iva = $data['p_iva'];
        $user->telephone = $data['telephone'];
        $user->shipping = $data['shipping'];
        $user->min_price = $data['min_price'];
        $user->save();

        if(isset($data['categories'])) {
            $user->categories()->sync($data['categories']);
        }

        return redirect()->route('home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

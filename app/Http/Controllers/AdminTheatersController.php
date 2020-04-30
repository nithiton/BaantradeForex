<?php

namespace App\Http\Controllers;

use App\Models\Theaters;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminTheatersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $theaters = Theaters::withTrashed()->paginate(env('per_page'));
        return view('admin.theaters.index',compact('theaters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.theaters.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['slug' => Str::slug($request->input('title'),'_')]);
        $validatedData = $request->validate([
            'title' => ['bail','required', 'unique:theaters', 'max:255'],
            'slug' => ['bail','required', 'unique:theaters', 'max:255'],
            'url' => ['bail','required','active_url', 'starts_with:https://www.youtube.com', 'max:255'],
            'short_content' => ['bail','required', 'max:255'],
        ]);

        $theater = new Theaters();
        $theater->title = $validatedData['title'];
        $theater->slug = $validatedData['slug'];
        $theater->url = $validatedData['url'];
        $theater->short_content = $validatedData['short_content'];
        if($theater->save()) {
            return redirect(route('admin.theaters.index'))->with(['success' => 'create success.']);
        }else{
            return redirect(route('admin.theaters.create'))->with(['error' => 'create failed.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Theaters  $theater
     * @return \Illuminate\Http\Response
     */
    public function show(Theaters $theater)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Theaters  $theater
     * @return \Illuminate\Http\Response
     */
    public function edit(Theaters  $theater)
    {
        return view('admin.theaters.edit',['theater'=>$theater]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Theaters  $theater
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Theaters  $theater)
    {
        $request->merge(['slug' => Str::slug($request->input('title'),'_')]);
        $validatedData = $request->validate([
            'title' => ['bail','required', 'unique:theaters,title,'.$theater->id, 'max:255'],
            'slug' => ['bail','required', 'unique:theaters,slug,'.$theater->id, 'max:255'],
            'url' => ['bail','required','active_url', 'starts_with:https://www.youtube.com', 'max:255'],
            'short_content' => ['bail','required', 'max:255'],
        ]);

        $theater->title = $validatedData['title'];
        $theater->slug = $validatedData['slug'];
        $theater->url = $validatedData['url'];
        $theater->short_content = $validatedData['short_content'];
        if($theater->save()) {
            return redirect(route('admin.theaters.edit',[$theater->slug]))->with(['success' => 'update success.']);
        }else{
            return redirect(route('admin.theaters.edit',[$theater->slug]))->with(['error' => 'update failed.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Theaters  $theater
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theaters  $theater)
    {
        if($theater->delete()) {
            return redirect(route('admin.theaters.index'))->with(['success' => 'delete success.']);
        }else{
            return redirect(route('admin.theaters.index'))->with(['error' => 'delete failed.']);
        }
    }

    /**
     * Restore the specified resource from trash.
     *
     * @param  Theaters  $theater
     * @return \Illuminate\Http\Response
     */
    public function restore(Theaters  $theater)
    {
        if($theater->restore()) {
            return redirect(route('admin.theaters.index'))->with(['success' => 'restore success.']);
        }else{
            return redirect(route('admin.theaters.index'))->with(['error' => 'restore failed.']);
        }
    }
}

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
        $videos = Theaters::withTrashed()->paginate(env('per_page'));
        return view('admin.theaters.index',compact('videos'));
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
        $request->merge(['slug' => Str::slug($request->input('title'),'_','TH')]);
        $validatedData = $request->validate([
            'title' => ['bail','required', 'unique:theaters', 'max:255'],
            'slug' => ['bail','required', 'unique:theaters', 'max:255'],
            'url' => ['bail','required','active_url', 'starts_with:https://www.youtube.com,https://youtube.com', 'max:255'],
            'short_content' => ['bail','required', 'max:255'],
        ]);
        $validatedData['url'] = Str::of($validatedData['url'])->replace('watch?v=','embed/');

        $video = new Theaters();
        $video->title = $validatedData['title'];
        $video->slug = $validatedData['slug'];
        $video->url = $validatedData['url'];
        $video->short_content = $validatedData['short_content'];
        if($video->save()) {
            return redirect(route('admin.theaters.index'))->with(['success' => 'create success.']);
        }else{
            return redirect(route('admin.theaters.create'))->with(['error' => 'create failed.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Theaters  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Theaters $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Theaters  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Theaters  $video)
    {
        return view('admin.theaters.edit',['video'=>$video]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Theaters  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Theaters  $video)
    {
        $request->merge(['slug' => Str::slug($request->input('title'),'_','TH')]);
        $validatedData = $request->validate([
            'title' => ['bail','required', 'unique:theaters,title,'.$video->id, 'max:255'],
            'slug' => ['bail','required', 'unique:theaters,slug,'.$video->id, 'max:255'],
            'url' => ['bail','required','active_url', 'starts_with:https://www.youtube.com,https://youtube.com', 'max:255'],
            'short_content' => ['bail','required', 'max:255'],
        ]);
        $validatedData['url'] = Str::of($validatedData['url'])->replace('watch?v=','embed/');

        $video->title = $validatedData['title'];
        $video->slug = $validatedData['slug'];
        $video->url = $validatedData['url'];
        $video->short_content = $validatedData['short_content'];
        if($video->save()) {
            return redirect(route('admin.theaters.edit',[$video->slug]))->with(['success' => 'update success.']);
        }else{
            return redirect(route('admin.theaters.edit',[$video->slug]))->with(['error' => 'update failed.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Theaters  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theaters  $video)
    {
        if($video->delete()) {
            return redirect(route('admin.theaters.index'))->with(['success' => 'delete success.']);
        }else{
            return redirect(route('admin.theaters.index'))->with(['error' => 'delete failed.']);
        }
    }

    /**
     * Restore the specified resource from trash.
     *
     * @param  Theaters  $video
     * @return \Illuminate\Http\Response
     */
    public function restore(Theaters  $video)
    {
        if($video->restore()) {
            return redirect(route('admin.theaters.index'))->with(['success' => 'restore success.']);
        }else{
            return redirect(route('admin.theaters.index'))->with(['error' => 'restore failed.']);
        }
    }
}

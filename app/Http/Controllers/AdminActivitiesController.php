<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activities;

class AdminActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activities::withTrashed()->paginate(env('per_page'));
        return view('admin.activities.index',compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.activities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['bail','required', 'unique:news', 'max:255'],
            'slug' => ['bail','required', 'unique:news', 'max:255'],
            'short_content' => ['bail','required', 'max:255'],
            'content' => ['bail','required'],
        ]);

        $activity = new Activities();
        $activity->title = $validatedData['title'];
        $activity->slug = $validatedData['slug'];
        $activity->short_content = $validatedData['short_content'];
        $activity->content = $validatedData['content'];
        if($activity->save()) {
            return redirect(route('admin.activities.index'))->with(['success' => 'create success.']);
        }else{
            return redirect(route('admin.activities.create'))->with(['error' => 'create failed.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Activities $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activities $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Activities $activity
     * @return \Illuminate\Http\Response
     */
    public function edit(Activities $activity)
    {
        return view('admin.activities.edit',['activity'=>$activity]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Activities $activity
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activities $activity)
    {
        $validatedData = $request->validate([
            'title' => ['bail','required', 'unique:news,title,'.$activity->id, 'max:255'],
            'slug' => ['bail','required', 'unique:news,slug,'.$activity->id, 'max:255'],
            'short_content' => ['bail','required', 'max:255'],
            'content' => ['bail','required'],
        ]);

        $activity->title = $validatedData['title'];
        $activity->slug = $validatedData['slug'];
        $activity->short_content = $validatedData['short_content'];
        $activity->content = $validatedData['content'];
        if($activity->save()) {
            return redirect(route('admin.activities.edit',[$activity->slug]))->with(['success' => 'update success.']);
        }else{
            return redirect(route('admin.activities.edit',[$activity->slug]))->with(['error' => 'update failed.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Activities $activity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activities $activity)
    {
        if($activity->delete()) {
            return redirect(route('admin.activities.index'))->with(['success' => 'delete success.']);
        }else{
            return redirect(route('admin.activities.index'))->with(['error' => 'delete failed.']);
        }
    }

    /**
     * Restore the specified resource from trash.
     *
     * @param  Activities $activity
     * @return \Illuminate\Http\Response
     */
    public function restore(Activities $activity)
    {
        if($activity->restore()) {
            return redirect(route('admin.activities.index'))->with(['success' => 'restore success.']);
        }else{
            return redirect(route('admin.activities.index'))->with(['error' => 'restore failed.']);
        }
    }
}

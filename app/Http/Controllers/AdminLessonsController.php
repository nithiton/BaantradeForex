<?php

namespace App\Http\Controllers;

use App\Models\Lessons;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminLessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lessons::withTrashed()->paginate(env('per_page'));
        return view('admin.lessons.index',compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lessons.create');
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
            'title' => ['bail','required', 'unique:activities', 'max:255'],
            'slug' => ['bail','required', 'unique:activities', 'max:255'],
            'short_content' => ['bail','required', 'max:255'],
            'content' => ['bail','required'],
        ]);

        $lesson = new Lessons();
        $lesson->title = $validatedData['title'];
        $lesson->slug = $validatedData['slug'];
        $lesson->short_content = $validatedData['short_content'];
        $lesson->content = $validatedData['content'];
        if($lesson->save()) {
            return redirect(route('admin.lessons.index'))->with(['success' => 'create success.']);
        }else{
            return redirect(route('admin.lessons.create'))->with(['error' => 'create failed.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Lessons  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lessons $lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Lessons  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lessons $lesson)
    {
        return view('admin.lessons.edit',['lesson'=>$lesson]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Lessons  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lessons $lesson)
    {
        $request->merge(['slug' => Str::slug($request->input('title'),'_','TH')]);
        $validatedData = $request->validate([
            'title' => ['bail','required', 'unique:lessons,title,'.$lesson->id, 'max:255'],
            'slug' => ['bail','required', 'unique:lessons,slug,'.$lesson->id, 'max:255'],
            'short_content' => ['bail','required', 'max:255'],
            'content' => ['bail','required'],
        ]);

        $lesson->title = $validatedData['title'];
        $lesson->slug = $validatedData['slug'];
        $lesson->short_content = $validatedData['short_content'];
        $lesson->content = $validatedData['content'];
        if($lesson->save()) {
            return redirect(route('admin.lessons.edit',[$lesson->slug]))->with(['success' => 'update success.']);
        }else{
            return redirect(route('admin.lessons.edit',[$lesson->slug]))->with(['error' => 'update failed.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Lessons  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lessons $lesson)
    {
        if($lesson->delete()) {
            return redirect(route('admin.lessons.index'))->with(['success' => 'delete success.']);
        }else{
            return redirect(route('admin.lessons.index'))->with(['error' => 'delete failed.']);
        }
    }

    /**
     * Restore the specified resource from trash.
     *
     * @param  Lessons $lesson
     * @return \Illuminate\Http\Response
     */
    public function restore(Lessons $lesson)
    {
        if($lesson->restore()) {
            return redirect(route('admin.lessons.index'))->with(['success' => 'restore success.']);
        }else{
            return redirect(route('admin.lessons.index'))->with(['error' => 'restore failed.']);
        }
    }
}

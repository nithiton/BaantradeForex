<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Str;

class AdminNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::withTrashed()->paginate(env('per_page'));
        return view('admin.news.index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
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
            'title' => ['bail','required', 'unique:news', 'max:255'],
            'slug' => ['bail','required', 'unique:news', 'max:255'],
            'short_content' => ['bail','required', 'max:255'],
            'content' => ['bail','required'],
            'cover_image' => ['bail','required','image','mimes:jpeg,png,jpg','max:2048','required']
        ]);

        $news = new News();
        $news->title = $validatedData['title'];
        $news->slug = $validatedData['slug'];
        $news->short_content = $validatedData['short_content'];
        $news->content = $validatedData['content'];
        $imageName = 'upload/images/news/'.$news->getNextId().'/cover_image.'.$validatedData['cover_image']->extension();
        $news->cover_image = $imageName;
        //check if move file image fail
        if(!$request->file('cover_image')->move(public_path('upload/images/news/'.$news->getNextId().'/'), $imageName)){
            return redirect(route('admin.news.create'))->with(['error' => 'move file failed.']);
        }
        if($news->save()) {
            return redirect(route('admin.news.index'))->with(['success' => 'create success.']);
        }else{
            return redirect(route('admin.news.create'))->with(['error' => 'create failed.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.news.edit',['new'=>$news]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $request->merge(['slug' => Str::slug($request->input('title'),'_','TH')]);
        $validatedData = $request->validate([
            'title' => ['bail','required', 'unique:news,title,'.$news->id, 'max:255'],
            'slug' => ['bail','required', 'unique:news,slug,'.$news->id, 'max:255'],
            'short_content' => ['bail','required', 'max:255'],
            'content' => ['bail','required'],
            'cover_image' => ['sometimes','required','bail','image','mimes:jpeg,png,jpg','max:2048']
        ]);

        $news->title = $validatedData['title'];
        $news->slug = $validatedData['slug'];
        $news->short_content = $validatedData['short_content'];
        $news->content = $validatedData['content'];
        if($request->has('cover_image') && isset($validatedData['cover_image'])){
            $imageName = 'upload/images/news/'.$news->id.'/cover_image.'.$validatedData['cover_image']->extension();
            $news->cover_image = $imageName;
            //check if move file image fail
            if(!$request->file('cover_image')->move(public_path('upload/images/news/'.$news->id.'/'), $imageName)){
                return redirect(route('admin.news.create'))->with(['error' => 'move file failed.']);
            }
        }
        if($news->save()) {
            return redirect(route('admin.news.edit',[$news->slug]))->with(['success' => 'update success.']);
        }else{
            return redirect(route('admin.news.edit',[$news->slug]))->with(['error' => 'update failed.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        if($news->delete()) {
            return redirect(route('admin.news.index'))->with(['success' => 'delete success.']);
        }else{
            return redirect(route('admin.news.index'))->with(['error' => 'delete failed.']);
        }
    }

    /**
     * Restore the specified resource from trash.
     *
     * @param  News $news
     * @return \Illuminate\Http\Response
     */
    public function restore(News $news)
    {
        if($news->restore()) {
            return redirect(route('admin.news.index'))->with(['success' => 'restore success.']);
        }else{
            return redirect(route('admin.news.index'))->with(['error' => 'restore failed.']);
        }
    }
}

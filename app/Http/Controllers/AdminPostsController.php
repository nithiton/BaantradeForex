<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::withTrashed()->paginate(env('per_page'));
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
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
            'author' => ['bail','max:255'],
        ]);

        $post = new Posts();
        $post->title = $validatedData['title'];
        $post->slug = $validatedData['slug'];
        $post->short_content = $validatedData['short_content'];
        $post->content = $validatedData['content'];
        $post->author = $validatedData['author'];
        if($post->save()) {
            return redirect(route('admin.posts.index'))->with(['success' => 'create success.']);
        }else{
            return redirect(route('admin.posts.create'))->with(['error' => 'create failed.']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Posts $post
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Posts $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Posts $post)
    {
        return view('admin.posts.edit',['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Posts $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Posts $post)
    {
        $validatedData = $request->validate([
            'title' => ['bail','required', 'unique:news,title,'.$post->id, 'max:255'],
            'slug' => ['bail','required', 'unique:news,slug,'.$post->id, 'max:255'],
            'short_content' => ['bail','required', 'max:255'],
            'content' => ['bail','required'],
            'author' => ['bail','max:255'],
        ]);

        $post->title = $validatedData['title'];
        $post->slug = $validatedData['slug'];
        $post->short_content = $validatedData['short_content'];
        $post->content = $validatedData['content'];
        $post->author = $validatedData['author'];
        if($post->save()) {
            return redirect(route('admin.posts.edit',[$post->slug]))->with(['success' => 'update success.']);
        }else{
            return redirect(route('admin.posts.edit',[$post->slug]))->with(['error' => 'update failed.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Posts $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Posts $post)
    {
        if($post->delete()) {
            return redirect(route('admin.posts.index'))->with(['success' => 'delete success.']);
        }else{
            return redirect(route('admin.posts.index'))->with(['error' => 'delete failed.']);
        }
    }

    /**
     * Restore the specified resource from trash.
     *
     * @param  Posts $post
     * @return \Illuminate\Http\Response
     */
    public function restore(Posts $post)
    {
        if($post->restore()) {
            return redirect(route('admin.posts.index'))->with(['success' => 'restore success.']);
        }else{
            return redirect(route('admin.posts.index'))->with(['error' => 'restore failed.']);
        }
    }
}

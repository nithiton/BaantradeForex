<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use Illuminate\Support\Str;

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
        $request->merge(['slug' => Str::slug($request->input('title'),'_','TH')]);
        $validatedData = $request->validate([
            'title' => ['bail','required', 'unique:posts', 'max:255'],
            'slug' => ['bail','required', 'unique:posts', 'max:255'],
            'short_content' => ['bail','required', 'max:255'],
            'content' => ['bail','required'],
            'author' => ['bail','max:255'],
            'cover_image' => ['bail','required','image','mimes:jpeg,png,jpg','max:2048']
        ]);

        $post = new Posts();
        $post->title = $validatedData['title'];
        $post->slug = $validatedData['slug'];
        $post->short_content = $validatedData['short_content'];
        $post->content = $validatedData['content'];
        $post->author = $validatedData['author'];
        $imageName = 'upload/images/posts/'.$post->getNextId().'/cover_image.'.$validatedData['cover_image']->extension();
        $post->cover_image = $imageName;
        //check if move file image fail
        if(!$request->file('cover_image')->move(public_path('upload/images/posts/'.$post->getNextId().'/'), $imageName)){
            return redirect(route('admin.posts.create'))->with(['error' => 'move file failed.']);
        }
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
        $request->merge(['slug' => Str::slug($request->input('title'),'_','TH')]);
        $validatedData = $request->validate([
            'title' => ['bail','required', 'unique:posts,title,'.$post->id, 'max:255'],
            'slug' => ['bail','required', 'unique:posts,slug,'.$post->id, 'max:255'],
            'short_content' => ['bail','required', 'max:255'],
            'content' => ['bail','required'],
            'author' => ['bail','max:255'],
            'cover_image' => ['sometimes','required','bail','image','mimes:jpeg,png,jpg','max:2048']
        ]);

        $post->title = $validatedData['title'];
        $post->slug = $validatedData['slug'];
        $post->short_content = $validatedData['short_content'];
        $post->content = $validatedData['content'];
        $post->author = $validatedData['author'];
        if($request->has('cover_image') && isset($validatedData['cover_image'])){
            $imageName = 'upload/images/posts/'.$post->id.'/cover_image.'.$validatedData['cover_image']->extension();
            $post->cover_image = $imageName;
            //check if move file image fail
            if(!$request->file('cover_image')->move(public_path('upload/images/posts/'.$post->id.'/'), $imageName)){
                return redirect(route('admin.posts.create'))->with(['error' => 'move file failed.']);
            }
        }
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

    /**
     * Display a listing of search.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        if(!request()->filled('search_query')){
            return redirect()->to(route('admin.posts.index'));
        }
        $posts = Posts::search(request('search_query'))->paginate(env('PER_PAGE'));
        return view('admin.posts.search',compact('posts'));
    }
}

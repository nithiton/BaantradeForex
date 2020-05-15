<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::paginate(env('PER_PAGE'));
        return view('posts.index',compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Posts  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Posts $post)
    {
        if(!Session::has('posts')){
            Session::put('posts',[$post->id=>true]);
            Session::save();
            $post->addViewed();
        }else{
            if(!Arr::has(Session::get('posts'),$post->id)){
                Session::put('posts',[$post->id=>true]);
                Session::save();
                $post->addViewed();
            }
        }
        return view('posts.show',['post'=>$post]);
    }

    /**
     * Display a listing of search.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        if(!request()->filled('search_query')){
            return redirect()->to(route('posts.index'));
        }
        $posts = Posts::search(request('search_query'))->paginate(env('PER_PAGE'));
        return view('posts.search',compact('posts'));
    }

}

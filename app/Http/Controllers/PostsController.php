<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

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
        return view('posts.show',['post'=>$post]);
    }

}

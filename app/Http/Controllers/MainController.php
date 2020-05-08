<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\News;
use App\Models\Posts;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a Home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexHome () {
        $limit = env('PER_HOMEPAGE');
        $news = News::limit($limit)->get();
        $posts = Posts::limit($limit)->get();
        $activities = Activities::limit($limit)->get();
        return view('home',compact('news','posts','activities'));
    }

    /**
     * Display a About us page.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAboutUs(){
        return view('about_us');
    }

    /**
     * Display a admin home page.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAdmin(){
        return view('admin.home');
    }
}

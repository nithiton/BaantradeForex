<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\Lessons;
use App\Models\News;
use App\Models\Posts;
use App\Models\Theaters;
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
        $limit = env('PER_DASHBOARD');
        $news = News::withoutGlobalScope('lasted')->orderBy('viewed','desc')->limit($limit)->get();
        $posts = Posts::withoutGlobalScope('lasted')->orderBy('viewed','desc')->limit($limit)->get();
        $activities = Activities::withoutGlobalScope('lasted')->orderBy('viewed','desc')->limit($limit)->get();

        $lessons = Lessons::withoutGlobalScope('lasted')->orderBy('viewed','desc')->limit($limit)->get();
        $videos = Theaters::withoutGlobalScope('lasted')->orderBy('viewed','desc')->limit($limit)->get();
        return view('admin.home',compact('news','posts','activities','lessons','videos'));
    }
}

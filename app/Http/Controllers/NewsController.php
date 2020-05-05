<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::paginate(env('PER_PAGE'));
        return view('news.index',compact('news'));
    }

    /**
     * Display the specified resource.
     *
     * @param  News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        if(!Session::has('news')){
            Session::put('news',[$news->id=>true]);
            Session::save();
            $news->addViewed();
        }else{
            if(!Arr::has(Session::get('news'),$news->id)){
                Session::put('news',[$news->id=>true]);
                Session::save();
                $news->addViewed();
            }
        }
        return view('news.show',['new'=>$news]);
    }

}

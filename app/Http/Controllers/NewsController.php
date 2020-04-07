<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //get all resource of news
    public function index(){
        $news = News::paginate(3);
        return view('news.index',compact('news'));
    }

    //get one resource of news
    public function show(News $news){
        return view('news.show',['new'=>$news]);
    }

    //
    public function create(){

    }

    //
    public function store(){

    }

    //
    public function edit(){

    }

    //
    public function update(){

    }

    //
    public function destroy(){

    }
}

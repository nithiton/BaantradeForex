<?php

namespace App\Http\Controllers;

use App\Models\Theaters;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;

class TheatersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Theaters::paginate(env('PER_PAGE'));
        return view('theaters.index',compact('videos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Theaters  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Theaters  $video)
    {
        if(!Session::has('theaters')){
            Session::put('theaters',[$video->id=>true]);
            Session::save();
            $video->addViewed();
        }else{
            if(!Arr::has(Session::get('theaters'),$video->id)){
                Session::put('theaters',[$video->id=>true]);
                Session::save();
                $video->addViewed();
            }
        }
        return view('theaters.show',['video'=>$video]);
    }

    /**
     * Display a listing of search.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        if(!request()->filled('search_query')){
            return redirect()->to(route('theaters.index'));
        }
        $videos = Theaters::search(request('search_query'))->paginate(env('PER_PAGE'));
        return view('theaters.search',compact('videos'));
    }

}

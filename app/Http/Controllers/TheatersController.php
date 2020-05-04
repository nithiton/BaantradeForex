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
        if(!Session::has('theater')){
            Session::put('theater',[$video->id=>true]);
            Session::save();
            dd('count+1');
        }else{
            if(!Arr::has(Session::get('theater'),$video->id)){
                Session::put('theater',[$video->id=>true]);
                Session::save();
                dd('count+1');
            }
        }
        return view('theaters.show',['video'=>$video]);
    }

}

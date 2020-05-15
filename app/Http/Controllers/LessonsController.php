<?php

namespace App\Http\Controllers;

use App\Models\Lessons;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;

class LessonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lessons::paginate(env('PER_PAGE'));
        return view('lessons.index',compact('lessons'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Lessons  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lessons  $lesson)
    {
        if(!Session::has('lessons')){
            Session::put('lessons',[$lesson->id=>true]);
            Session::save();
            $lesson->addViewed();
        }else{
            if(!Arr::has(Session::get('lessons'),$lesson->id)){
                Session::put('lessons',[$lesson->id=>true]);
                Session::save();
                $lesson->addViewed();
            }
        }
        return view('lessons.show',['lesson'=>$lesson]);
    }

    /**
     * Display a listing of search.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        if(!request()->filled('search_query')){
            return redirect()->to(route('lessons.index'));
        }
        $lessons = Lessons::search(request('search_query'))->paginate(env('PER_PAGE'));
        return view('lessons.search',compact('lessons'));
    }

}

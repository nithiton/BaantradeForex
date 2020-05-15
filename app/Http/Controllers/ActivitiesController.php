<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Session;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activities::paginate(env('PER_PAGE'));
        return view('activities.index',compact('activities'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Activities $activity
     * @return \Illuminate\Http\Response
     */
    public function show(Activities $activity)
    {
        if(!Session::has('activities')){
            Session::put('activities',[$activity->id=>true]);
            Session::save();
            $activity->addViewed();
        }else{
            if(!Arr::has(Session::get('activities'),$activity->id)){
                Session::put('activities',[$activity->id=>true]);
                Session::save();
                $activity->addViewed();
            }
        }
        return view('activities.show',['activity'=>$activity]);
    }

    /**
     * Display a listing of search.
     *
     * @return \Illuminate\Http\Response
     */
    public function search()
    {
        if(!request()->filled('search_query')){
            return redirect()->to(route('activities.index'));
        }
        $activities = Activities::search(request('search_query'))->paginate(env('PER_PAGE'));
        return view('activities.search',compact('activities'));
    }

}

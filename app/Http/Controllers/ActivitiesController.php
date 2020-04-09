<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use Illuminate\Http\Request;

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
        return view('activities.show',['activity'=>$activity]);
    }

}

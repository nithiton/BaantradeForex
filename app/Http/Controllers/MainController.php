<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Display a About us page.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAboutUs(){
        return view('about_us');
    }
}

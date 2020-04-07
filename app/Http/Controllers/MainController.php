<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    //
    public function indexAboutUs(){
        return view('about_us');
    }
}

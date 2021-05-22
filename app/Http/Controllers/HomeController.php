<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class HomeController extends Controller
{


    /**
     * Query language.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index($lang)
    {
        return view('landing.home');
    }

    public function homeForm($lang)
    {
        return view('landing.home');
    }
}

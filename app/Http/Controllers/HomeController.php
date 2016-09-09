<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home')->with('content','');
    }

    public function tables(){
        return view('home')->with('content','wcwlgzh.tables');
    }
    
    public function flot(){
        return view('home')->with('content','wcwlgzh.flot');
    }
}

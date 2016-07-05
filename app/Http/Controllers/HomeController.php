<?php

namespace contenidoAudiovisual\Http\Controllers;

use contenidoAudiovisual\Http\Requests;
use contenidoAudiovisual\Movie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies = Movie::Movies();
        return view ('index',compact('movies'));
        //return view('index');
    }
}

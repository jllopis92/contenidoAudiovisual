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
        $newMovies = Movie::where('state', 1)->orderBy('created_at', 'desc')->take(4)->get();
        $visitMovies = Movie::where('state', 1)->orderBy('visit', 'desc')->take(4)->get();
        return view ('index',compact('newMovies','visitMovies'));
        //return view('index');
    }
}

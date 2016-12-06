<?php

namespace contenidoAudiovisual\Http\Controllers;

use contenidoAudiovisual\Http\Requests;
use contenidoAudiovisual\Movie;
use contenidoAudiovisual\Advertising;
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
        $advertisings = Advertising::all();
        $newMovies = Movie::where('state', 1)->orderBy('created_at', 'desc')->take(6)->get();
        $visitMovies = Movie::where('state', 1)->orderBy('visit', 'desc')->take(6)->get();
        $bestMovies = Movie::where('state', 1)->orderBy('rating', 'desc')->take(6)->get();
        return view ('index',compact('advertisings','newMovies','visitMovies','bestMovies'));
        //return view('index');
    }
}

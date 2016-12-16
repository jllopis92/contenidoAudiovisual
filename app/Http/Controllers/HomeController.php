<?php

namespace contenidoAudiovisual\Http\Controllers;

use contenidoAudiovisual\Http\Requests;
use contenidoAudiovisual\Movie;
use contenidoAudiovisual\Advertising;
use contenidoAudiovisual\Notification;
use contenidoAudiovisual\Trailer;
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
        $newMovies = Movie::where('state', 1)->orderBy('created_at', 'desc')->take(8)->get();
        $visitMovies = Movie::where('state', 1)->orderBy('visit', 'desc')->take(8)->get();
        $bestMovies = Movie::where('state', 1)->orderBy('rating', 'desc')->take(8)->get();
        $trailers = Trailer::all();
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('index',compact('advertisings','newMovies','visitMovies','bestMovies','trailers','notifications'));
        //return view('index');
    }
}

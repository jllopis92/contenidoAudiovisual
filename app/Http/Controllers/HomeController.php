<?php

namespace contenidoAudiovisual\Http\Controllers;

use contenidoAudiovisual\Http\Requests;
use contenidoAudiovisual\Movie;
use contenidoAudiovisual\Advertising;
use contenidoAudiovisual\Notification;
use contenidoAudiovisual\Trailer;
use contenidoAudiovisual\Subject;
use contenidoAudiovisual\Genre;
use contenidoAudiovisual\Format;
use contenidoAudiovisual\Type;
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
        $advertisings = Advertising::where('state', 1)->get();
        $newMovies = Movie::where('state', 1)->orderBy('created_at', 'desc')->take(8)->get();
        $visitMovies = Movie::where('state', 1)->orderBy('visit', 'desc')->take(8)->get();
        $bestMovies = Movie::where('state', 1)->orderBy('rating', 'desc')->take(8)->get();
        $trailers = Trailer::all();

        $subjects = Subject::where('valid', 1)->get();
        $genres = Genre::where('valid', 1)->get();
        $formats = Format::where('valid', 1)->get();
        $types = Type::where('valid', 1)->get();

        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('index',compact('advertisings','newMovies','visitMovies','bestMovies','trailers','subjects','genres','formats','types','notifications'));
        //return view('index');
    }
}

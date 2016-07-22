<?php

namespace contenidoAudiovisual\Http\Controllers;

use Illuminate\Http\Request;
use contenidoAudiovisual\Movie;
use contenidoAudiovisual\Http\Requests;

class CineTvController extends Controller
{
    public function index()
    {
    	$movies = Movie::Movies();
    	return view ('cineTv.index',compact('movies'));
        //return view('cineTv.index');
    }
}

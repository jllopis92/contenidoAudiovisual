<?php

namespace contenidoAudiovisual\Http\Controllers;

use Illuminate\Http\Request;

use contenidoAudiovisual\Http\Requests;

class CineTvController extends Controller
{
    public function index()
    {
        return view('cineTv.index');
    }
}

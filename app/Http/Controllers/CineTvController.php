<?php

namespace contenidoAudiovisual\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use contenidoAudiovisual\Playlist;
use contenidoAudiovisual\Http\Requests;

class CineTvController extends Controller
{
    public function index()
    {
    	$playlists = Playlist::paginate(5);
    	return view ('cineTv.index',compact('playlists'));
        //return view('cineTv.index');
    }
    public function show($id)
    {
        $playlist = Playlist::find($id);
    	//$playlists = DB::table('playlists')->where('id', '=', $id);
    	return view ('cineTv.playlist',compact('playlist'));
        //return view('cineTv.index');
    }
}

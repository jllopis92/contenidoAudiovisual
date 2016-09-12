<?php

namespace contenidoAudiovisual\Http\Controllers;

use Illuminate\Http\Request;
use contenidoAudiovisual\Movie;
use contenidoAudiovisual\Http\Requests;

class AdvertisingController extends Controller
{
    public function store(Request $request){

    	$movie = Movie::find($request['id']);
        /*$movies = Movie::all();
        $playlist = Playlist::create([
        	'name' => $request['name'],
        	'duration' => $request['duration'],
        	'state' => 1,
        	]);
        $playlistId = $playlist->id;
        foreach ($movies as $movie){
        	if($request[$movie->id] != null){
        		 $MovieInPlaylist = MovieInPlaylist::create([
	        		'playlist_id' => $playlistId,
	        		'movie_id' => $movie->id,
	        		'name' => $movie->name,
	        		'url' => $movie->url,
	        		'duration' => $movie->duration,
	        		'state' => 1,
        		]);
        	}
        }*/
        return "OK";
    }
}

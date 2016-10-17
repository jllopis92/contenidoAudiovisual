<?php

namespace contenidoAudiovisual\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use contenidoAudiovisual\Movie;
use contenidoAudiovisual\Advertising;
use contenidoAudiovisual\Http\Requests;

class AdvertisingController extends Controller
{
    public function store(Request $request){

        //revisar pioridad
    	//$movie = Movie::find($request['id']);
        /*$advertisings = DB::table('advertising')->orderBy('priority');
        foreach ($advertisings as $advert){
            echo "pub: ".$advert->priority;
        }*/

        $movies = Movie::all();

        foreach ($movies as $movie){
            if($request['id'] == $movie->id){
                $advertising = Advertising::create([
                    'movie_id' => $request['id'],
                    'name' => $movie->name,
                    'description' => $movie->description,
                    'priority' => 1,
                    'image' => $movie->imageRef,
                ]);
                echo "movie: ".$movie->name." ".$request['id'];
            }
        }


        /*$playlist = Playlist::create([
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


        /*$movie = Movie::find($request['id']);
        $name = $movie->name;
        $description = $movie->description;
        $imageRef = $movie->imageRef;
        $advertising = Advertising::create([
            'movie_id' => $request['id'],
            'name' => $name,
            'description' => $description,
            'priority' => 1,
            'image' => $imageRef,
        ]);*/

        return "OK";
    }
}

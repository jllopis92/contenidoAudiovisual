<?php

namespace contenidoAudiovisual\Http\Controllers;

use Illuminate\Http\Request;
use contenidoAudiovisual\Http\Requests;

use contenidoAudiovisual\Movie;
use contenidoAudiovisual\Programation;
use contenidoAudiovisual\MovieInProgram;

class ProgramingController extends Controller
{
    public function store(Request $request){
   
    	$timestamp = strtotime($request['start']);
    	echo "time: ".$request['start'];
        $movies = Movie::all();
        $programation = Programation::create([
        	'start_at' => $request['start_at'],
        	'duration' => $request['duration'],
        	'play_at' => $timestamp,
        	]);
        $programationId = $programation->id;
        foreach ($movies as $movie){
        	if($request[$movie->id] != null){
        		 $MovieInProgram = MovieInProgram::create([
	        		'programation_id' => $programation->id,
	        		'movie_id' => $movie->id,
	        		'name' => $movie->name,
	        		'url' => $movie->url,
        		]);
        	}
        }
        return $programation->id;
    }
}

<?php

namespace contenidoAudiovisual\Http\Controllers;

use Illuminate\Http\Request;
use contenidoAudiovisual\Http\Requests;

use contenidoAudiovisual\Movie;
use contenidoAudiovisual\Programation;
use contenidoAudiovisual\MovieInProgram;

use DateTime;

class ProgramingController extends Controller
{
    public function store(Request $request){
        if($request->ajax()){
            $inicio = 0;
            $totalDuration = 0;
            /*$date = new DateTime('2000-01-01');
            echo $date->format('Y-m-d H:i:s');*/
            $iteration = 0;
           /* $date = $request['date'];
            $newDate = new DateTime($date);
            $formatDate = $newDate->format('Y-m-d H:i:s');*/
            $json = $request['jsonSend'];
            $array = json_decode($json);
            foreach($array as $obj){
                $id = $obj->id;
                $name = $obj->name;
                $url = $obj->url;
                $duration = $obj->duration;
                $play_at = $obj->play_at;
                $end_at = $obj->end_at;
                $fin = new DateTime($end_at);

                $duration = $obj->duration;
                $newDuration = new DateTime($duration);
                $formatDuration = $newDuration->format('H:i:s');

                if($iteration == 0){
                    $inicio = new DateTime($play_at);
                    $totalDuration = $formatDuration;
                }else{
                    $time2_arr = [];
                    $time1 = $totalDuration;
                    $time2_arr = explode(":", $formatDuration);
                    //Hour
                    if(isset($time2_arr[0]) && $time2_arr[0] != ""){
                        $time1 = $time1." +".$time2_arr[0]." hours";
                        $time1 = date("H:i:s", strtotime($time1));
                    }
                    //Minutes
                    if(isset($time2_arr[1]) && $time2_arr[1] != ""){
                        $time1 = $time1." +".$time2_arr[1]." minutes";
                        $time1 = date("H:i:s", strtotime($time1));
                    }
                    //Seconds
                    if(isset($time2_arr[2]) && $time2_arr[2] != ""){
                        $time1 = $time1." +".$time2_arr[2]." seconds";
                        $time1 = date("H:i:s", strtotime($time1));
                    }

                    $totalDuration = date("H:i:s", strtotime($time1));
                    
                }
                $iteration = $iteration + 1;
            }
            $movies = Movie::all();
            $programation = Programation::create([
                'duration' => $totalDuration,
                'play_at' => $inicio,
                'end_at' => $fin,
            ]);
            $programationId = $programation->id;
            foreach($array as $obj){
                $id = $obj->id;
                $name = $obj->name;
                $url = $obj->url;
                $duration = $obj->duration;
                $play_at = $obj->play_at;
                $end_at = $obj->end_at;
                $inicio = new DateTime($play_at);
                $fin = new DateTime($end_at);
                
                foreach ($movies as $movie){
                    if($movie->id == $obj->id){
                        $MovieInProgram = MovieInProgram::create([
                            'programation_id' => $programationId,
                            'movie_id' => $id,
                            'name' => $name,
                            'url' => $movie->url,
                            'play_at' => $inicio,
                            'end_at' => $fin, 
                        ]);
                    }
                }
            }
        return "program: ". $programation;
        }
    }
}
        /*$movies = Movie::all();
            $programation = Programation::create([
                'duration' => $request['duration'], //calcular
                'play_at' => $inicio,
                'end_at' => $fin, 
            ]);
            $programationId = $programation->id;
            foreach ($movies as $movie){
                if($request[$movie->id] != null){
                     $MovieInProgram = MovieInProgram::create([
                        'programation_id' => $programation->id,
                        'movie_id' => $movie->id,
                        'name' => $movie->name,
                        'url' => $movie->url,
                        'play_at' => $inicio,
                        'end_at' => $fin, 
                    ]);
                }
            }*/
        //return $formatDate;
        //return "Objetos: ".sizeof($array);
        //return "Iter: ". $iteration;
        /*$timestamp = strtotime($request['start']);
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
        }*/
        //return $programation->id;
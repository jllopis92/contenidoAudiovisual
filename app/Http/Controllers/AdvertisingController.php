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

        $movies = Movie::all();

        foreach ($movies as $movie){
            if($request['id'] == $movie->id){
                $advertising = Advertising::create([
                    'movie_id' => $request['id'],
                    'name' => $movie->name,
                    'description' => $movie->description,
                    'image' => $movie->imageRef,
                    'state' => 1,
                ]);
            }
        }

        $advertisings = Advertising::where('state', 1)->paginate(8);
        $create = 1;
        return view ('cpanel.showAdvertising',compact('advertisings', 'create'));
    }
    public function delete(Request $request){
        $advertising = Advertising::find($request['id']);
        $state = 0;
        $advertising->fill([
            'state' => $state,
        ]);
        $advertising->save();
        $advertisings = Advertising::where('state', 1)->paginate(8);
        $create = 2;
        return view ('cpanel.showAdvertising',compact('advertisings', 'create'));
    }
    
}

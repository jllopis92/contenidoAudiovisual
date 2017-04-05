<?php

namespace contenidoAudiovisual\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use contenidoAudiovisual\Movie;
use contenidoAudiovisual\Advertising;
use contenidoAudiovisual\Notification;
use contenidoAudiovisual\Http\Requests;

class AdvertisingController extends Controller
{
    public function store(Request $request){

        $movies = Movie::all();
        if($request['id'] != 0){
            foreach ($movies as $movie){
                if($request['id'] == $movie->id){
                    $advertising = Advertising::create([
                        'movie_id' => $request['id'],
                        'name' => $movie->name,
                        'description' => $movie->description,
                        'imageMovie' => $movie->advertisingImage,
                        'state' => 1,
                    ]);
                }
            }  
        }else{
            $advertising = Advertising::create([
                'movie_id' => $request['id'],
                'name' => $request['name'],
                'description' => $request['description'],
                'link' => $request['link'],
                'image' => $request['image'],
                'state' => 1,
            ]);
        }
        
        $create = 1;
        $what = 'advertising';
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('cpanel.index',compact('create','what','notifications'));
    }
    public function delete(Request $request){
        $advertising = Advertising::find($request['id']);
        $state = 0;
        $advertising->fill([
            'state' => $state,
        ]);
        $advertising->save();
        $create = 2;
        $what = 'advertising';
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('cpanel.index',compact('create','what','notifications'));
    }
}

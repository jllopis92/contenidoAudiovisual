<?php

namespace contenidoAudiovisual\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use contenidoAudiovisual\Genre;
use contenidoAudiovisual\Notification;
use contenidoAudiovisual\Http\Requests;

class GenreController extends Controller
{
    public function store(Request $request){
        $genre = Genre::create([
            'name' => $request['name'],
        ]);
        $create = 1;
        $what = 'genre';
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('cpanel.index',compact('create','what','notifications'));
    }
    public function delete(Request $request){
        $genre = Genre::find($request['id']);
        $genre->fill([
            'valid' => 0,
        ]);
        $genre->save();
        $create = 2;
        $what = "genre";
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('cpanel.index', compact('create','what','notifications'));
    }
}
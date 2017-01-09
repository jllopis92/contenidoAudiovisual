<?php

namespace contenidoAudiovisual\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use contenidoAudiovisual\Commentary;
use contenidoAudiovisual\Movie;
use contenidoAudiovisual\User;
use contenidoAudiovisual\Subject;
use contenidoAudiovisual\Subtitle;
use contenidoAudiovisual\Trailer;
use contenidoAudiovisual\Genre;
use contenidoAudiovisual\Format;
use contenidoAudiovisual\Type;
use contenidoAudiovisual\Notification;
use contenidoAudiovisual\Http\Requests;
use Redirect;

class CommentaryController extends Controller
{
    public function show($id){
        $movie = Movie::find($id);
        $newMovies = Movie::where('state', 1)->orderBy('created_at', 'desc')->take(5)->get();
        $trailers = Trailer::where('video_id', $id)->take(1)->get();

        $commentaries = Commentary::where('valid', 1)->orderBy('created_at', 'desc')->get();
        $users = User::all();

        $subjects = Subject::where('valid', 1)->get();
        $genres = Genre::where('valid', 1)->get();
        $formats = Format::where('valid', 1)->get();
        $types = Type::where('valid', 1)->get();

        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('play.show',compact('movie','newMovies','trailers','commentaries','users','subjects','genres','formats','types','notifications'));
        //return view ('play.show',['movie'=>$movies],['trailer'=>$trailers]);
    }

    public function store(Request $request){

        $commentary = Commentary::create([
            'movie_id' => $request['movie_id'],
            'user_id' => $request['user_id'],
            'text' => $request['text'],
            'valid' => 1,
        ]);


        $movie = Movie::find($request['movie_id']);
        $newMovies = Movie::where('state', 1)->orderBy('created_at', 'desc')->take(5)->get();
        $trailers = Trailer::where('video_id', $request['movie_id'])->take(1)->get();
        $commentaries = Commentary::where('valid', 1)->orderBy('created_at', 'desc')->get();
        $users = User::all();

        $subjects = Subject::where('valid', 1)->get();
        $genres = Genre::where('valid', 1)->get();
        $formats = Format::where('valid', 1)->get();
        $types = Type::where('valid', 1)->get();

        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();

        //return Redirect::to('show');

        return view ('play.show',compact('movie','newMovies','trailers','commentaries','users','subjects','genres','formats','types','notifications'));
    }
    public function destroy($id){
        $commentary = Commentary::find($id);
        $commentary->fill([
            'valid' => 0,
        ]);
        $commentary->save();

        $movieId = $commentary->movie_id;


        $movie = Movie::find($movieId);
        $newMovies = Movie::where('state', 1)->orderBy('created_at', 'desc')->take(5)->get();
        $trailers = Trailer::where('video_id', $movieId)->take(1)->get();
        $commentaries = Commentary::where('valid', 1)->orderBy('created_at', 'desc')->get();
        $users = User::all();

        $subjects = Subject::where('valid', 1)->get();
        $genres = Genre::where('valid', 1)->get();
        $formats = Format::where('valid', 1)->get();
        $types = Type::where('valid', 1)->get();

        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();

        return view ('play.show',compact('movie','newMovies','trailers','commentaries','users','subjects','genres','formats','types','notifications'));
    }
}
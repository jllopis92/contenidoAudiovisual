<?php

namespace contenidoAudiovisual\Http\Controllers;

use Request;
use DB;
use contenidoAudiovisual\Movie;
use contenidoAudiovisual\Trailer;
use contenidoAudiovisual\Subject;
use contenidoAudiovisual\Genre;
use contenidoAudiovisual\Format;
use contenidoAudiovisual\Type;
use contenidoAudiovisual\Notification;
use contenidoAudiovisual\Http\Requests;

class QueryController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            /*$subject = Subject::lists('name', 'id');
            $user = User::lists('name', 'id');
            return view('upload.register', compact('subject','user'));*/
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(){
        
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function filter(){

        $subjects = Subject::where('valid', 1)->get();
        $genres = Genre::where('valid', 1)->get();
        $formats = Format::where('valid', 1)->get();
        $types = Type::where('valid', 1)->get();

        $firstTrue = 0;
        $firstTrue2 = 0;
        $firstTrue3 = 0;
       
        $moviesQuery = Movie::query();
        $moviesQuery->where('state', '=', 1);

        foreach ($genres as $key => $genre) {
            if(Request::input($genre->name) != ""){
                if($firstTrue == 0){
                    $moviesQuery->where('genre_id','like','%'.$genre->id.'%');
                    $firstTrue = 1;
                }else{
                    $moviesQuery->orwhere('genre_id','like','%'.$genre->id.'%');
                }       
            }
        }
        foreach ($types as $key => $type) {
            if(Request::input($type->name) != ""){
                if($firstTrue2 == 0){
                    $moviesQuery->where('type_id','like','%'.$type->id.'%');
                    $firstTrue2 = 1;
                }else{
                    $moviesQuery->orwhere('type_id','like','%'.$type->id.'%');
                }
            }
        }
        foreach ($formats as $key => $format) {
            if(Request::input($format->name) != ""){
                if($firstTrue3 == 0){
                    $moviesQuery->where('format_id','like','%'.$format->id.'%');
                    $firstTrue3 = 1;
                }else{
                    $moviesQuery->orwhere('format_id','like','%'.$format->id.'%');
                }
            }
        }
        $movies = $moviesQuery->orderBy('rating', 'desc')->take(8)->get();

        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();

        return view('search', compact('movies', 'query', 'query2', 'subjects', 'genres', 'formats', 'types','notifications'));
    }
    public function search(Request $request){
        // Gets the query string from our form submission 
        $query = Request::input('search');

        $movies = DB::table('movies')
        ->where('state', '=', 1)
        ->where(function ($sql) use ($query){
            $sql->where('name','like','%'.$query.'%')
            ->orWhere('name','like','%'.$query.'%')
            ->orWhere('language','like','%'.$query.'%')
            ->orWhere('description','like','%'.$query.'%')
            ->orWhere('direction','like','%'.$query.'%')
            ->orWhere('casting','like','%'.$query.'%')
            ->orWhere('continuista','like','%'.$query.'%')
            ->orWhere('script','like','%'.$query.'%')
            ->orWhere('production','like','%'.$query.'%')
            ->orWhere('camara','like','%'.$query.'%')
            ->orWhere('art_direction','like','%'.$query.'%')
            ->orWhere('actors','like','%'.$query.'%');
        })->orderBy('rating', 'desc')->take(8)->get();

      
        $subjects = Subject::where('valid', 1)->get();
        $genres = Genre::where('valid', 1)->get();
        $formats = Format::where('valid', 1)->get();
        $types = Type::where('valid', 1)->get();

        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
 
        // returns a view and passes the view the list of articles and the original query.
        return view('search', compact('movies', 'query', 'subjects', 'genres', 'formats', 'types','notifications'));
    }

}

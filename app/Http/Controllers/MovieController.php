<?php

namespace contenidoAudiovisual\Http\Controllers;

use DB;
use Request;
use contenidoAudiovisual\Movie;
use contenidoAudiovisual\User;
use contenidoAudiovisual\Subject;
use contenidoAudiovisual\Http\Requests;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $subject = Subject::lists('name', 'id');
        $user = User::lists('name', 'id');
        return view('upload.create', compact('subject','user'));
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
    public function store(Request $request)
    {
        Movie::create($request->all());
        return "listo";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $movies = Movie::find($id);
        return view ('play.borrar',['movie'=>$movies]);
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
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request){
        // Gets the query string from our form submission 
        $query = Request::input('search');

        $movies = Movie::where('name','like','%'.$query.'%')
        ->orderBy('name')
        ->paginate(20);
 
        // returns a view and passes the view the list of articles and the original query.
        return view('search', compact('movies', 'query'));
    }
}

<?php

namespace contenidoAudiovisual\Http\Controllers;

use Request;
use DB;
use contenidoAudiovisual\Movie;

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
        // Sets the parameters from the get request to the variables.
        //First filter
        $largometraje = Request::input('largometraje');
        $cortometraje = Request::input('cortometraje');
        $animacion = Request::input('animacion');
        $documental = Request::input('documental');

        //Second filter
        $fourK = Request::input('4K');
        $twoK = Request::input('2K');
        $hd = Request::get('HD');
        $miniDv = Request::get('MiniDV');
        $sixteenMm = Request::input('16mm');
        $thirtyFiveMm = Request::input('35mm');


        $movies = DB::table('movies')
            ->where('state', '=', 1)
            ->where(function ($query) use ($largometraje, $cortometraje, $animacion, $documental, $fourK, $twoK, $hd, $miniDv, $sixteenMm, $thirtyFiveMm) {
                $query->where(function ($query) use ($largometraje, $cortometraje, $animacion, $documental) {
                    $query->where('category', '=', $largometraje)
                        ->orwhere('category', '=', $cortometraje)
                        ->orWhere('category', '=', $animacion)
                        ->orWhere('category', '=', $documental);
                    })
                    ->Where(function ($query2) use ($fourK, $twoK, $hd, $miniDv, $sixteenMm, $thirtyFiveMm) {
                    $query2->where('shooting_format', '=', $fourK)
                        ->orwhere('shooting_format', '=', $twoK)
                        ->orWhere('shooting_format', '=', $hd)
                        ->orWhere('shooting_format', '=', $miniDv)
                        ->orWhere('shooting_format', '=', $sixteenMm)
                        ->orWhere('shooting_format', '=', $thirtyFiveMm);
                        });
            })
            ->get();
        return view('search', compact('movies', 'query', 'query2'));
    }
    public function search(Request $request){
        // Gets the query string from our form submission 
        $query = Request::input('search');

        $movies = DB::table('movies')
        ->where('state', '=', 1)
        ->where('name','like','%'.$query.'%')
        ->orderBy('name')
        ->paginate(20);
 
        // returns a view and passes the view the list of articles and the original query.
        return view('search', compact('movies', 'query'));
    }

}

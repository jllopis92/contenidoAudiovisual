<?php

namespace contenidoAudiovisual\Http\Controllers;

use Request;
use DB;
use contenidoAudiovisual\Movie;
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
        // Sets the parameters from the get request to the variables.
        //First filter
        $largometraje = "";
        $mediometraje = "";
        $cortometraje = "";

        //Second filter
        $experimental = "";
        $ficcion = "";
        $animacion = "";
        $documental = "";

        //Thrist filter
        $fourK = "";
        $twoK = "";
        $hd = "";
        $miniDv = "";
        $sixteenMm = "";
        $thirtyFiveMm = "";

        //First filter
        $largometraje = Request::input('largometraje');
        $mediometraje = Request::input('mediometraje');
        $cortometraje = Request::input('cortometraje');
        $experimental = Request::input('experimental');

        //Second filter
        $ficcion = Request::input('ficcion');
        $animacion = Request::input('animacion');
        $documental = Request::input('documental');

        //Thrist filter
        $fourK = Request::input('4K');
        $twoK = Request::input('2K');
        $hd = Request::get('HD');
        $miniDv = Request::get('MiniDV');
        $sixteenMm = Request::input('16mm');
        $thirtyFiveMm = Request::input('35mm');

        if( $largometraje == "" && $mediometraje == "" && $cortometraje == ""){
            $largometraje = "largometraje";
            $mediometraje = "mediometraje";
            $cortometraje = "cortometraje";
        }
        if( $experimental == "" && $ficcion == "" && $animacion == "" && $documental == ""){
            $experimental = "experimental";
            $ficcion = "ficcion";
            $animacion = "animacion";
            $documental = "documental";
        }
        if( $fourK == "" && $twoK == "" && $hd == "" && $miniDv == "" && $sixteenMm == "" && $thirtyFiveMm == ""){
            $fourK = "4K";
            $twoK = "2K";
            $hd = "HD";
            $miniDv = "MiniDV";
            $sixteenMm = "16mm";
            $thirtyFiveMm = "35mm";
        }

        $movies = DB::table('movies')
            ->where('state', '=', 1)
            ->where(function ($query) use ($largometraje, $mediometraje, $cortometraje, $experimental, $ficcion, $animacion, $documental, $fourK, $twoK, $hd, $miniDv, $sixteenMm, $thirtyFiveMm) {
                $query->where(function ($query) use ($largometraje, $mediometraje, $cortometraje) {
                    $query->where('category', '=', $largometraje)
                        ->orwhere('category', '=', $mediometraje)
                        ->orwhere('category', '=', $cortometraje);
                    })
                    ->where(function ($query2) use ($experimental, $ficcion, $animacion, $documental) {
                    $query2->where('category2', '=', $experimental)
                        ->orWhere('category2', '=', $ficcion)
                        ->orWhere('category2', '=', $animacion)
                        ->orWhere('category2', '=', $documental);
                        })
                    ->where(function ($query3) use ($fourK, $twoK, $hd, $miniDv, $sixteenMm, $thirtyFiveMm) {
                    $query3->where('shooting_format', '=', $fourK)
                        ->orwhere('shooting_format', '=', $twoK)
                        ->orWhere('shooting_format', '=', $hd)
                        ->orWhere('shooting_format', '=', $miniDv)
                        ->orWhere('shooting_format', '=', $sixteenMm)
                        ->orWhere('shooting_format', '=', $thirtyFiveMm);
                        });
            })
            ->get();
            $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view('search', compact('movies', 'query', 'query2','notifications'));
    }
    public function search(Request $request){
        // Gets the query string from our form submission 
        $query = Request::input('search');

        $movies = DB::table('movies')
        ->where('state', '=', 1)
        ->where('name','like','%'.$query.'%')
        ->orderBy('name')
        ->paginate(20);

        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
 
        // returns a view and passes the view the list of articles and the original query.
        return view('search', compact('movies', 'query','notifications'));
    }

}

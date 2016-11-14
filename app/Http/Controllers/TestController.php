<?php

namespace contenidoAudiovisual\Http\Controllers;

use DB;
use contenidoAudiovisual\Test;
use Illuminate\Http\Request;
use Redirect;
use Session;
use JsValidator;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        /*$tests = Test::paginate(4);
        return view ('test.index', compact('tests'));*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('test.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if($request->ajax()){
        Test::create($request->all());
        return response()->json([
            "mensaje" => "creado"
            ]);
    }
/*
        $movie = Movie::create([
            'usuario_id' => $request['usuario_id'],
            'asignatura_id' => $request['asignatura_id'],
            'name' => $request['name'],
            'visit' => $request['visit'],
            'language' => $request['language'],
            'creation_date' => $request['creation_date'],
            'description' => $request['description'],
            'imageRef' => $request['imageRef'],
            'url' => $request['url'],
            'state' => $request['state'],
            'production_year' => $request['production_year'],
            'category' => $request['category'],
            'category2' => $request['category2'],
            'shooting_format' => $request['shooting_format'],
            'direction' => $request['direction'],
            'direction_assistant' => $request['direction_assistant'],
            'casting' => $request['casting'],
            'continuista' => $request['continuista'],
            'script' => $request['script'],
            'production' => $request['production'],
            'production_assistant' => $request['production_assistant'],
            'photografic_direction' => $request['photografic_direction'],
            'camara' => $request['camara'],
            'camara_assistant' => $request['camara_assistant'],
            'art_direction' => $request['art_direction'],
            'mounting' => $request['mounting'],
            'image_postproduction' => $request['image_postproduction'],
            'sound_postproduction' => $request['sound_postproduction'],
            'catering' => $request['catering'],
            'music' => $request['music'],
            'actors' => $request['actors'],
            ]);*/
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
}

<?php

namespace contenidoAudiovisual\Http\Controllers;

use DB;
use contenidoAudiovisual\Movie;
use contenidoAudiovisual\User;
use contenidoAudiovisual\Subject;
use contenidoAudiovisual\Subtitle;
use contenidoAudiovisual\Trailer;
use Illuminate\Http\Request;
use Redirect;
use Session;

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
        ]);
        $movieId = $movie->id;

        if($request['subtitle'] != null){
            $sub = Subtitle::create([
                'video_id' => $movieId,
                'url' => $request['subtitle'],
                ]);
            }
        if($request['trailer'] != null){
            $trailer = Trailer::create([
                'video_id' => $movieId,
                'url' => $request['trailer'],
                ]);
            if($request['trailer_subtitle'] != null){
                $trailerId = $trailer->id;

                $subTrailer = Subtitle::create([
                    'trailer_id' => $trailerId,
                    'url' => $request['trailer_subtitle'],
                    ]);
            }
        }
        return "OK";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $movies = Movie::find($id);
        return view ('play.show',['movie'=>$movies]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $movie = Movie::find($id);
        return view('cpanel.editMovie',['movie'=>$movie]);
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
        $movie = Movie::find($id);
        $movie->fill($request->all());
        $movie->save();
        Session::flash('message','Video Actualizado Correctamente');
        return Redirect::to('/cpanel');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function approveMovie(Request $request)
    {
        $id = $request['video_id'];
        $movie = Movie::find($id);
        $movie->fill([
            'state' => $request['state'],
            ]);
        $movie->save();
        $users = User::paginate(4);
        return view ('cpanel.index', compact('users'));
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

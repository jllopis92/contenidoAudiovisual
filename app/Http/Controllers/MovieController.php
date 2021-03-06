<?php

namespace contenidoAudiovisual\Http\Controllers;

use DB;
use contenidoAudiovisual\Movie;
use contenidoAudiovisual\User;
use contenidoAudiovisual\Subject;
use contenidoAudiovisual\Subtitle;
use contenidoAudiovisual\Trailer;
use contenidoAudiovisual\Commentary;
use contenidoAudiovisual\Genre;
use contenidoAudiovisual\Format;
use contenidoAudiovisual\Type;
use contenidoAudiovisual\Notification;
use Illuminate\Http\Request;
use Redirect;
use Session;
use JsValidator;

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
        $genres = DB::table('genres')->get();
        $formats = DB::table('formats')->get();
        $types = DB::table('types')->get();
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();

        return view('upload.create', compact('subject','user','notifications','genres','formats','types'));
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
        /*$file = Input::file('imageRef');
        $image = \Image::make(\Input::file('imageRef'));*/
        //$path = "/files/"//ruta a fotos

        //$image->save($path.$file->getClientOriginalName());
        //$image->resize(200, 200);
        //$image->save($path.$file->getClientOriginalName());
        // create instance
        


        /*$validator = Validator::make($request->all(), [$this->validationRules]);

        if ($validator->fails()){
            return redirect()->back()->withErrors($validator->errors());
        }*/

        /*'type_id' => $request['category'],
            'genre_id' => $request['category2'],*/

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
            'type_id' => $request['category'],
            'genre_id' => $request['category2'],
            'format_id' => $request['shooting_format'],
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
            'cant_other' => $request['cant_other'],
            'other1Name' => $request['other1Name'],
            'other1Content' => $request['other1Content'],
            'other2Name' => $request['other2Name'],
            'other2Content' => $request['other2Content'],
            'other3Name' => $request['other3Name'],
            'other3Content' => $request['other3Content'],
        ]);
        $movieId = $movie->id;
        $movieName = $movie->name;
        $users = User::all();
        $userName = "NULL";

        foreach($users as $user){
            if($user->id == $request['usuario_id']){
                $userName = $user->name;
            }
        }
        if ($users){
           foreach($users as $user){
                if($user->tipo == "profesor" || $user->tipo == "administrador"){
                    $notif = Notification::create([
                        'movie_id' => $movieId,
                        'movie_name' => $movieName,
                        'send_to' => $user->id,
                        'user_id' => $request['usuario_id'],
                        'user_name' => $userName,
                        'reason' => 'create',
                    ]);
                }
           }
        }
        if($request['subtitle_1'] != null){
            $sub = Subtitle::create([
                'video_id' => $movieId,
                'url' => $request['subtitle_1'],
                'language' => $request['language_1'],
            ]);
        }
        if($request['subtitle_2'] != null){
            $sub = Subtitle::create([
                'video_id' => $movieId,
                'url' => $request['subtitle_2'],
                'language' => $request['language_2'],
            ]);
        }
        if($request['subtitle_3'] != null){
            $sub = Subtitle::create([
                'video_id' => $movieId,
                'url' => $request['subtitle_3'],
                'language' => $request['language_3'],
            ]);
        }
        if($request['subtitle_4'] != null){
            $sub = Subtitle::create([
                'video_id' => $movieId,
                'url' => $request['subtitle_4'],
                'language' => $request['language_4'],
            ]);
        }
        if($request['subtitle_5'] != null){
            $sub = Subtitle::create([
                'video_id' => $movieId,
                'url' => $request['subtitle_5'],
                'language' => $request['language_5'],
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
        //$users = User::paginate(4);
        //para ver archivos eliminados
        //$users = User::onlyTrashed()->paginate(4);
        $create = 1;
        $what = "movie";
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();

        return view ('cpanel.index', compact('create','what','notifications'));
        //return view ('cpanel.index', compact('notifications'));      
        //return "OK";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $movie = Movie::find($id);
        $newMovies = Movie::where('state', 1)->orderBy('created_at', 'desc')->take(5)->get();
        $trailers = Trailer::where('video_id', $id)->take(1)->get();
        $subtitles = Subtitle::where('video_id', $id)->get();
        

        $commentaries = Commentary::where('valid', 1)->orderBy('created_at', 'desc')->get();
        $users = User::all();

        $subjects = Subject::where('valid', 1)->get();
        $genres = Genre::where('valid', 1)->get();
        $formats = Format::where('valid', 1)->get();
        $types = Type::where('valid', 1)->get();

        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('play.show',compact('movie','newMovies','trailers','subtitles','commentaries','users','subjects','genres','formats','types','notifications'));
        //return view ('play.show',['movie'=>$movies],['trailer'=>$trailers]);
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
        $subjects = Subject::where('valid', 1)->get();
        $genres = Genre::where('valid', 1)->get();
        $formats = Format::where('valid', 1)->get();
        $types = Type::where('valid', 1)->get();

        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('cpanel.editMovie',compact('movie','notifications','subjects','genres','formats','types'));
        //return view('cpanel.editMovie',['movie'=>$movie]);
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
        echo "en controller";
        $movie = Movie::find($id);
        $movie->fill($request->all());
        $movie->save();
        $create = 0;
        $what = "movie";
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();

        return view ('cpanel.index', compact('create','what','notifications'));
       /* Session::flash('message','Video Actualizado Correctamente');
        return Redirect::to('/cpanel');*/

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

        $id = $request['id'];
        $movie = Movie::find($id);
        $newState = $request['state'];
        $movie->fill([
            'state' => $newState,
        ]);
        if($newState == 0 || $newState == 2){
            $movie->fill([
                'observation' => $request['observation'],
            ]);
        }
        $movie->save();
        $users = User::all();

        $movieId = $movie->id;

        if ($users){
           foreach($users as $user){
                if($user->tipo == "profesor" || $user->tipo == "administrador"){
                    if($newState == 0){
                            $state = 'reprove';
                        }else if($newState == 1){
                            $state = 'aprove';
                        }else if($newState == 2){
                            $state = 'observation';
                        }else if($newState== 3){
                            $state = 'wait';
                        }
                    $notif = Notification::create([
                        'movie_id' => $movieId,
                        'send_to' => $user->id,
                        'user_id' => $request['usuario_id'],
                        'reason' => $state,
                    ]);
                }
           }
        }

        $create = 0;
        $what = "movie";
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();

        return view ('cpanel.index', compact('create','what','notifications'));

        /*$aproves = DB::table('movies')
        ->where('state', '=', 1)
        ->paginate(6);
        $reproves = DB::table('movies')
        ->where('state', '=', 0)
        ->paginate(6);
        $waits = DB::table('movies')
        ->where('state', '=', 3)
        ->paginate(6);
        $observations = DB::table('movies')
        ->where('state', '=', 2)
        ->paginate(6);

        $users = User::all();
        return view ('cpanel.movieapprove',compact('aproves','reproves','waits','observations','users'));*/
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

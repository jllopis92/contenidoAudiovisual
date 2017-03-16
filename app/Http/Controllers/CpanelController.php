<?php

namespace contenidoAudiovisual\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use contenidoAudiovisual\User;
use contenidoAudiovisual\Movie;
use contenidoAudiovisual\Subject;
use contenidoAudiovisual\Genre;
use contenidoAudiovisual\Format;
use contenidoAudiovisual\Type;
use contenidoAudiovisual\Advertising;
use contenidoAudiovisual\Notification;
use contenidoAudiovisual\Http\Requests;
use Redirect;
use Session;

class CpanelController extends Controller
{
    public function index()
    {
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        $create = 3;
        $what = "nothing";
        //$users = User::paginate(4);
        //para ver archivos eliminados
        //$users = User::onlyTrashed()->paginate(4);
        return view ('cpanel.index', compact('create','what','notifications'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function selectuser()
    {
        //$users = User::paginate(8);
        $users = DB::table('users')->get();
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('cpanel.selectUser',compact('users','notifications'));
    }
    public function selectpassword()
    {
        $users = DB::table('users')->get();
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('cpanel.selectUserPassword',compact('users','notifications'));
    }
    public function selectrange()
    {
        //$users = User::where('tipo', '!=', 'administrador')->paginate(8);
        $users = DB::table('users')->get();
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('cpanel.selectUserRange',compact('users','notifications'));
    }
    public function showmovie()
    {
        //$movies = Movie::paginate(8);
        $movies = DB::table('movies')->get();
        $subjects = DB::table('subjects')->get();
        $genres = DB::table('genres')->get();
        $formats = DB::table('formats')->get();
        $types = DB::table('types')->get();
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('cpanel.movieupdate',compact('movies','subjects','genres','formats','types','notifications'));
    }
    public function showsubject()
    {
        //$subjects = Subject::where('valid', 1)->paginate(8);
        $users = DB::table('users')->get();
        $subjects = DB::table('subjects')->where('valid', '=', 1)->get();
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('cpanel.selectSubject',compact('users','subjects','notifications'));
    }
    public function showgenre()
    {
        //$genres = Genre::where('valid', 1)->paginate(8);
        $genres = DB::table('genres')->where('valid', '=', 1)->get();
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('cpanel.selectGenre',compact('genres','notifications'));
    }
    public function showformat()
    {
        //$formats = Format::where('valid', 1)->paginate(8);
        $formats = DB::table('formats')->where('valid', '=', 1)->get();
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('cpanel.selectFormat',compact('formats','notifications'));
    }
    public function showtype()
    {
        //$types = Type::where('valid', 1)->paginate(8);
        $types = DB::table('types')->where('valid', '=', 1)->get();
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('cpanel.selectType',compact('types','notifications'));
    }
    public function showadvert()
    {
        //$advertisings = Advertising::where('state', 1)->paginate(8);
        $advertisings = DB::table('advertising')->where('state', '=', 1)->get();
        $create = 0;
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('cpanel.showAdvertising',compact('advertisings','create','notifications'));
    }
    /**
     * Redirecciona a editar Video y marca la notificacion como vista.
     *
     * @param  int  $id = id de la notificacion
     * @return \Illuminate\Http\Response
     */
    public function editfromnotif($id)
    {
        $notification = Notification::find($id);
        $watch = 1;
        $notification->fill([
            'watch' => $watch,
        ]);
        $notification->save();
        return Redirect::to('editmovie');
    }


    public function approvemovie()
    {
        $aproves = DB::table('movies')
        ->where('state', '=', 1)->get();
        $reproves = DB::table('movies')
        ->where('state', '=', 0)->get();
        $waits = DB::table('movies')
        ->where('state', '=', 3)->get();
        $observations = DB::table('movies')
        ->where('state', '=', 2)->get();

        $users = User::all();
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('cpanel.movieapprove',compact('aproves','reproves','waits','observations','users','notifications'));
    }
    /**
     * Redirecciona a aprobar Video y marca la notificacion como vista.
     *
     * @param  int  $id = id de la notificacion
     * @return \Illuminate\Http\Response
     */
    public function approveMovieToNotif($id)
    {
        $notification = Notification::find($id);
        $watch = 1;
        $notification->fill([
            'watch' => $watch,
        ]);
        $notification->save();
        return Redirect::to('approvemovie');
    }

    /**
     * Redirección a estadisticas de usuario
     */
    public function showStatistics()
    {
        $seensBy = DB::table('seenBy')->get();
        $users = DB::table('users')->get();
        $movies = DB::table('movies')->get();
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('cpanel.showStatistics',compact('seensBy','users','movies','notifications'));
    }

     public function showVideoStatistics()
    {
        $seenBy = DB::table('seenBy')->get();
        $users = DB::table('users')->get();
        $movies = DB::table('movies')->get();
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('cpanel.showVideoStatistics',compact('seenBy','users','movies','notifications'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('cpanel.edit',compact('user','notifications'));
        //return view('cpanel.edit','notifications',['user'=>$user]);

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPassword($id)
    {
        $user = User::find($id);
        return view('cpanel.editPassword',['user'=>$user]);

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
        $user = User::find($id);

        $user->fill([
            'password' => bcrypt($request['password']),
        ]);
        $user->save();

        $create = 0;
        $what = "user";
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('cpanel.index', compact('create','what','notifications'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $user = User::find($id);
        $user->delete();
        $create = 2;
        $what = "user";
        return view ('cpanel.index', compact('create','what','notifications'));
    }
    
    public function createadvert()
    {
        $movies = Movie::paginate(8);
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('cpanel.createAdvertising',compact('movies','notifications'));
    }
    public function createprogram()
    {
        $movies = Movie::all();
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('cpanel.createPrograming2',compact('movies','notifications'));
    }

    
    public function createsubject()
    {   
        $users = User::where('tipo', 'profesor')->lists('name', 'id');
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('cpanel.createSubject',compact('users', 'notifications'));
    }
    public function creategenre()
    {
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('cpanel.createGenre',compact('notifications'));
    }
    public function createformat()
    {
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('cpanel.createFormat',compact('notifications'));
    }
    public function createtype()
    {
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('cpanel.createType',compact('notifications'));
    }
}

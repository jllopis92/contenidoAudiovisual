<?php

namespace contenidoAudiovisual\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use contenidoAudiovisual\User;
use contenidoAudiovisual\Movie;
use contenidoAudiovisual\Subject;
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
        //$users = User::paginate(4);
        //para ver archivos eliminados
        //$users = User::onlyTrashed()->paginate(4);
        return view ('cpanel.index', compact('notifications'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function selectuser()
    {
        $users = User::paginate(8);
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('cpanel.selectUser',compact('users','notifications'));
    }
    public function selectpassword()
    {
        $users = User::paginate(8);
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('cpanel.selectUserPassword',compact('users','notifications'));
    }
    public function selectrange()
    {
        $users = User::where('tipo', '!=', 'administrador')->paginate(8);
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('cpanel.selectUserRange',compact('users','notifications'));
    }
    public function showmovie()
    {
        $movies = Movie::paginate(8);
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('cpanel.movieupdate',compact('movies','notifications'));
    }
    public function approvemovie()
    {

        $aproves = DB::table('movies')
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
        return view ('cpanel.movieapprove',compact('aproves','reproves','waits','observations','users'));
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
        return view('cpanel.edit',['user'=>$user]);

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
        $user->fill($request->all());
        $user->save();
        Session::flash('message','Usuario Actualizado Correctamente');
        return Redirect::to('/cpanel');

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
        Session::flash('message','Usuario Eliminado Correctamente');
        return Redirect::to('/cpanel');

    }
    public function showadvert()
    {
        $advertisings = Advertising::where('state', 1)->paginate(8);
        $create = 0;
        return view ('cpanel.showAdvertising',compact('advertisings','create'));
    }
    public function createadvert()
    {
        $movies = Movie::paginate(8);
        return view ('cpanel.createAdvertising',compact('movies'));
    }
    public function createprogram()
    {
        $movies = Movie::all();
        //$movies = Movie::paginate(8);
        return view ('cpanel.createPrograming',compact('movies'));
    }
}

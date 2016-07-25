<?php

namespace contenidoAudiovisual\Http\Controllers;

use Illuminate\Http\Request;

use contenidoAudiovisual\User;
use contenidoAudiovisual\Movie;
use contenidoAudiovisual\Subject;
use contenidoAudiovisual\Http\Requests;
use Redirect;
use Session;

class CpanelController extends Controller
{
    public function index()
    {
        $users = User::paginate(4);
        //para ver archivos eliminados
        //$users = User::onlyTrashed()->paginate(4);
        return view ('cpanel.index', compact('users'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showmovie()
    {
        $movies = Movie::paginate(4);
        return view ('cpanel.movieupdate',compact('movies'));
    }
    public function approvemovie()
    {
        $movies = Movie::paginate(4);
        $users = User::all();
        return view ('cpanel.movieapprove',compact('movies','users'));
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
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        Session::flash('message','Usuario Eliminado Correctamente');
        return Redirect::to('/cpanel');

    }
}

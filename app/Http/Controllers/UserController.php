<?php

namespace contenidoAudiovisual\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use contenidoAudiovisual\User;
use contenidoAudiovisual\Notification;
use contenidoAudiovisual\Http\Requests;
use Redirect;
use Session;

class UserController extends Controller
{
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

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
        return view ('cpanel.editPassword',compact('user','notifications'));
        //return view('cpanel.editPassword',['user'=>$user]);

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
}

<?php

namespace contenidoAudiovisual\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use contenidoAudiovisual\Subject;
use contenidoAudiovisual\Notification;
use contenidoAudiovisual\Http\Requests;

class SubjectController extends Controller
{
    public function store(Request $request){

        $subject = Subject::create([
            'profesor_id' => $request['profesor_id'],
            'name' => $request['name'],
        ]);
        $create = 1;
        $what = 'subject';
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('cpanel.index',compact('create','what','notifications'));
    }
    public function delete(Request $request){
        $subject = Subject::find($request['id']);
        $subject->fill([
            'valid' => 0,
        ]);
        $subject->save();
        $create = 2;
        $what = "subject";
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('cpanel.index', compact('create','what','notifications'));
    }
}
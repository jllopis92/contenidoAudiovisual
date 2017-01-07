<?php

namespace contenidoAudiovisual\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use contenidoAudiovisual\Type;
use contenidoAudiovisual\Notification;
use contenidoAudiovisual\Http\Requests;

class TypeController extends Controller
{
    public function store(Request $request){
        $type = Type::create([
            'name' => $request['name'],
        ]);
        $create = 1;
        $what = 'type';
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('cpanel.index',compact('create','what','notifications'));
    }
    public function delete(Request $request){
        $type = Type::find($request['id']);
        $type->fill([
            'valid' => 0,
        ]);
        $type->save();
        $create = 2;
        $what = "type";
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('cpanel.index', compact('create','what','notifications'));
    }
}
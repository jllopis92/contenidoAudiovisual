<?php

namespace contenidoAudiovisual\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use contenidoAudiovisual\Format;
use contenidoAudiovisual\Notification;
use contenidoAudiovisual\Http\Requests;

class FormatController extends Controller
{
    public function store(Request $request){
        $format = Format::create([
            'name' => $request['name'],
        ]);
        $create = 1;
        $what = 'format';
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('cpanel.index',compact('create','what','notifications'));
    }
    public function delete(Request $request){
        $format = Format::find($request['id']);
        $format->fill([
            'valid' => 0,
        ]);
        $format->save();
        $create = 2;
        $what = "format";
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        return view ('cpanel.index', compact('create','what','notifications'));
    }
}
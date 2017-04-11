<?php

namespace contenidoAudiovisual\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use contenidoAudiovisual\Notification;
use contenidoAudiovisual\User;
use contenidoAudiovisual\Movie;
use contenidoAudiovisual\Http\Requests;
use Redirect;
use Session;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();
        $users = DB::table('users')->get();
        $movies = DB::table('movies')->get();
       
        return view ('cpanel.showNotifications', compact('notifications','users','movies'));
    }
    
}

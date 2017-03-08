<?php

namespace contenidoAudiovisual\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DateTimeZone;
use Carbon\Carbon;
use contenidoAudiovisual\Programation;
use contenidoAudiovisual\MovieInProgram;
use contenidoAudiovisual\Playlist;
use contenidoAudiovisual\Notification;
use contenidoAudiovisual\Http\Requests;

class CineTvController extends Controller
{
    public function index()
    {
        //$rightNow = Carbon::now();
        $rightNow = Carbon::now(new DateTimeZone('America/Santiago'));
        $difTime = 0;
        $playNow = 0;
        $valid = 0;
        $programationsCount = 0;
        //$formatted_date = Carbon::now()->subMinutes(5)->toDateTimeString(); 
        //$tomorrow = Carbon::now()->addDay();
        //$lastWeek = Carbon::now()->subWeek();
        //$nowInLondonTz = Carbon::now(new DateTimeZone('Europe/London'));
        //$q->whereDate('created_at', '=', Carbon::today()->toDateString());
        //$formatted_date = $rightNow->toDateTimeString();
        //echo $formatted_date;
        //$formatted_time = $rightNow->format('H:i:s');
        $programationsCount = Programation::where('end_at', '>=', $rightNow)->orderBy('play_at', 'asc')->get()->count();
         //echo "programations lenght".$programationsCount;

         //Si existe alguna programación
        if($programationsCount > 0){
            $playNow = 1;
            $programations = Programation::where('end_at', '>=', $rightNow)->orderBy('play_at', 'asc')->get();
            $programationsNow = $programations->first();



            
            $movies = MovieInProgram::where('end_at', '>=', $rightNow)->where('programation_id','=', $programationsNow->id)->orderBy('play_at', 'asc')->get();
            
            $moviesNow = $movies->first();
            //Si la programacion ya comenzo y aun se esta transmitiendo
            if($rightNow >= $programationsNow->play_at && $rightNow < $programationsNow->end_at){
                $playTime = Carbon::parse($programationsNow->play_at);
                $difTime = $rightNow->diffInSeconds($playTime);
                $valid = 1;
            //Si la programacion aun no empieza
            }else if ($rightNow < $programationsNow->play_at){
                $playNow = 0;
                $playTime = Carbon::parse($programationsNow->play_at);
                $difTime = $playTime->diffInSeconds($rightNow);
                $valid = 1;
            }
        //Si no hay nada programado
        }else{
            $programations = null;
            $programationsNow = null;
            $movies = null;
            $moviesNow = null; 
        }

        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();

        
        //$difTime = gmdate('H:i:s', $dif);
        //$dif = $rightNow->toTimeString() - $playTime->toTimeString();
        //echo (gmdate('H:i:s', $difTime));

        /*$q->whereDate('created_at', '=', Carbon::today()->toDateString());'Y-m-d'));
        $q->whereDay('created_at', '=', date('d'));
        $q->whereMonth('created_at', '=', date('m'));
        $q->whereYear('created_at', '=', date('Y'));*/
    	//$playlists = Playlist::paginate(5);
    	//return view ('cineTv.index',compact('playlists'));
        return view('cineTv.index',compact('programations','programationsNow','movies','moviesNow','difTime','playNow','valid', 'rightNow','programationsCount','notifications'));
    }
    public function show($id)
    {
        $playlist = Playlist::find($id);
    	//$playlists = DB::table('playlists')->where('id', '=', $id);
    	return view ('cineTv.playlist',compact('playlist'));
        //return view('cineTv.index');
    }
}

<?php

namespace contenidoAudiovisual\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use contenidoAudiovisual\Programation;
use contenidoAudiovisual\Playlist;
use contenidoAudiovisual\Http\Requests;

class CineTvController extends Controller
{
    public function index()
    {
        $rightNow = Carbon::now();
        $difTime = 0;
        $playNow = 1;
        //$formatted_date = Carbon::now()->subMinutes(5)->toDateTimeString(); 
        //$tomorrow = Carbon::now()->addDay();
        //$lastWeek = Carbon::now()->subWeek();
        //$nowInLondonTz = Carbon::now(new DateTimeZone('Europe/London'));
        //$q->whereDate('created_at', '=', Carbon::today()->toDateString());
        $programations = Programation::where('end_at', '>=', $rightNow)->orderBy('play_at', 'asc')->get();
        $programationsNow = $programations->first();
        if($rightNow >= $programationsNow->play_at && $rightNow <= $programationsNow->end_at){
            $playTime = Carbon::parse($programationsNow->play_at);
            $difTime = $rightNow->diffInSeconds($playTime);
        }else if ($rightNow <= $programationsNow->play_at){
            $playNow = 0;
            $playTime = Carbon::parse($programationsNow->play_at);
            $difTime = $playTime->diffInSeconds($rightNow);
        }
        
        //$difTime = gmdate('H:i:s', $dif);
        //$dif = $rightNow->toTimeString() - $playTime->toTimeString();
        //echo (gmdate('H:i:s', $difTime));

        /*$q->whereDate('created_at', '=', Carbon::today()->toDateString());'Y-m-d'));
        $q->whereDay('created_at', '=', date('d'));
        $q->whereMonth('created_at', '=', date('m'));
        $q->whereYear('created_at', '=', date('Y'));*/
    	//$playlists = Playlist::paginate(5);
    	//return view ('cineTv.index',compact('playlists'));
        return view('cineTv.index',compact('programations','programationsNow','difTime','playNow'));
    }
    public function show($id)
    {
        $playlist = Playlist::find($id);
    	//$playlists = DB::table('playlists')->where('id', '=', $id);
    	return view ('cineTv.playlist',compact('playlist'));
        //return view('cineTv.index');
    }
}

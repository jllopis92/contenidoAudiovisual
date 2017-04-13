<?php

namespace contenidoAudiovisual\Http\Controllers;

use Illuminate\Http\Request;
use JavaScript;
use DB;
use DateTimeZone;
use Carbon\Carbon;
use contenidoAudiovisual\Calendar;
use contenidoAudiovisual\Playlist;
use contenidoAudiovisual\Notification;
use contenidoAudiovisual\Subject;
use contenidoAudiovisual\Genre;
use contenidoAudiovisual\Format;
use contenidoAudiovisual\Type;
use contenidoAudiovisual\Http\Requests;

class CineTvController extends Controller
{
    public function index()
    {
        //date_default_timezone_set('America/Santiago');

        //echo "entra a index";
        //$rightNow = Carbon::now();
        $rightNow = Carbon::now(new DateTimeZone('America/Santiago'));

        $difTime = 0;
        $playNow = 0;
        $valid = 0;
        $programationsCount = 0;

        $formatted_date = $rightNow->toDateTimeString();
        //echo "hor formato: ".$formatted_date;
        //$formatted_date = Carbon::now()->subMinutes(5)->toDateTimeString(); 
        //$tomorrow = Carbon::now()->addDay();
        //$lastWeek = Carbon::now()->subWeek();
        //$nowInLondonTz = Carbon::now(new DateTimeZone('Europe/London'));
        //$q->whereDate('created_at', '=', Carbon::today()->toDateString());
        //$formatted_date = $rightNow->toDateTimeString();
        //echo $formatted_date;
        //$formatted_time = $rightNow->format('H:i:s');
        $programationsCount = Calendar::where('end_at', '>=', $formatted_date)->orderBy('startdate', 'asc')->get()->count();
         //echo "programations lenght ".$programationsCount;

         //Si existe alguna programación
        if($programationsCount > 0){
            //echo "hay program";
            $playNow = 1;
            $movies = Calendar::where('end_at', '>=', $formatted_date)->orderBy('startdate', 'asc')->get();
            /*date_timezone_set($date, timezone_open('Pacific/Chatham'));
            echo date_format($date, 'Y-m-d H:i:sP') . "\n";*/
            //echo "movies: ".$movies;
            //$programationsNow = $movies->first();
            $moviesNow = $movies->first();
            $nowstartdate = Carbon::parse($moviesNow->startdate);
            $nowenddate = Carbon::parse($moviesNow->enddate);
            //echo "ahora: ".$moviesNow;
            //echo "hora actual: ".$rightNow;
            //echo "hora inicio: ".$moviesNow->startdate;
            //echo "hora inicio carbon: ".$nowstartdate;
            //echo "hora fin carbon: ".$nowenddate;

            if($rightNow >= $nowstartdate && $rightNow < $nowenddate){
                //$playTime = Carbon::parse($nowstartdate);
                $difTime = $rightNow->diffInSeconds($nowstartdate);
                $valid = 1;
                //echo "ya empeso: ".$difTime;
            //Si la programacion aun no empieza
            }else if ($rightNow < $nowstartdate){
                $playNow = 0;
                $playTime = Carbon::parse($nowstartdate);
                $difTime = $playTime->diffInSeconds($rightNow);
                $valid = 1;
                //echo "aun no: ".$difTime;
            }
            JavaScript::put([
                'url' => $moviesNow->url,
                'difTime' => $difTime
            ]);
            //echo "valid: ".$valid;
        }else{
            //echo "no hay program";
            //Si no hay nada programado
            $programationsNow = null;
            $movies = null;
            $moviesNow = null; 
        }

         

        $types = Type::where('valid', 1)->get();
        $subjects = DB::table('subjects')->get();
        $genres = DB::table('genres')->get();
        $formats = DB::table('formats')->get();

        $calendars = DB::table('calendar')->get();

        $notifications = Notification::where('display', 1)->orderBy('send_to', 'desc')->get();

        return view('cineTv.index',compact('movies','moviesNow','difTime','playNow','valid','rightNow','programationsCount','notifications','types','subjects','genres','formats','calendars'));
            
            /*$movies = MovieInProgram::where('end_at', '>=', $rightNow)->where('programation_id','=', $programationsNow->id)->orderBy('play_at', 'asc')->get();
            
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
            }*/
        
        

       

        
        //$difTime = gmdate('H:i:s', $dif);
        //$dif = $rightNow->toTimeString() - $playTime->toTimeString();
        //echo (gmdate('H:i:s', $difTime));

        /*$q->whereDate('created_at', '=', Carbon::today()->toDateString());'Y-m-d'));
        $q->whereDay('created_at', '=', date('d'));
        $q->whereMonth('created_at', '=', date('m'));
        $q->whereYear('created_at', '=', date('Y'));*/
        //$playlists = Playlist::paginate(5);
        //return view ('cineTv.index',compact('playlists'));
       
    }
    public function show($id)
    {
        $playlist = Playlist::find($id);
        //$playlists = DB::table('playlists')->where('id', '=', $id);
        return view ('cineTv.playlist',compact('playlist'));
        //return view('cineTv.index');
    }
}

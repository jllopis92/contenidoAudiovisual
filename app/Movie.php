<?php

namespace contenidoAudiovisual;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
use contenidoAudiovisual\CustomVideo;
use FFMpeg;

class Movie extends Model
{
    protected $table = "movies";

    protected $fillable = ['usuario_id','asignatura_id','name','language','creation_date','description','imageRef','url','state','production_year','category','shooting_format','direction','direction_assistant','casting','continuista','script','production','production_assistant','photografic_direction','camara','camara_assistant','art_direction','sonorous_register','mounting','image_postproduction','sound_postproduction','catering','music','actors'];

    public function setImageRefAttribute($imageRef){

        $this->attributes['imageRef'] = Carbon::now()->second.$imageRef->getClientOriginalName();
        $name = Carbon::now()->second.$imageRef->getClientOriginalName(); 
        \Storage::disk('local')->put($name, \File::get($imageRef));
    }
    public function setUrlAttribute($url){

        $this->attributes['url'] = 'old/'.Carbon::now()->second.$url->getClientOriginalName();
        $name = Carbon::now()->second.$url->getClientOriginalName();
        \Storage::disk('local')->put($name, \File::get($url));

        $file = pathinfo($name,PATHINFO_FILENAME); 
        $extension = pathinfo($name,PATHINFO_EXTENSION);

        $ffmpeg = \FFMpeg\FFMpeg::create([
            'ffmpeg.binaries'  => '/Applications/MAMP/htdocs/FFmpeg/ffmpeg',
            'ffprobe.binaries' => '/Applications/MAMP/htdocs/FFmpeg/ffprobe',
            'timeout'          => 0, // The timeout for the underlying process
            'ffmpeg.threads'   => 12,   // The number of threads that FFMpeg should use

        ]);
        $video = $ffmpeg->open($url);
        //$format = new CustomVideo();
        $format = new FFMpeg\Format\Video\X264('libmp3lame', 'libx264');
        $format->on('progress', function ($video, $format, $percentage) {
            echo "$percentage % transcoded";
        });
        $format
        -> setKiloBitrate(1000)
        -> setAudioChannels(2)
        -> setAudioKiloBitrate(256);

        $video
        ->save($format, 'files/convert/'.$file.'.mp4');

        $this->attributes['url'] = $file.'.mp4';
        /*->save(new FFMpeg\Format\Video\X264(), 'export-x264.mp4')
    ->save(new FFMpeg\Format\Video\WMV(), 'export-wmv.wmv')
    ->save(new FFMpeg\Format\Video\WebM(), 'export-webm.webm');*/

//audio
/*        $ffmpeg = FFMpeg\FFMpeg::create();
        $audio = $ffmpeg->open('track.mp3');

        $format = new FFMpeg\Format\Audio\Flac();
        $format->on('progress', function ($audio, $format, $percentage) {
            echo "$percentage % transcoded";
        });

        $format
        -> setAudioChannels(2)
        -> setAudioKiloBitrate(256);

        $audio->save($format, 'track.flac');*/

    }
    
    public static function Movies(){
        return DB::table('movies')
        ->join('subjects','subjects.id','=','movies.asignatura_id')
        ->select('movies.*')
        ->get();
    }
}

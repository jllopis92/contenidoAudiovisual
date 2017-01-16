<?php

namespace contenidoAudiovisual;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
use contenidoAudiovisual\CustomVideo;
use FFMpeg;
use Intervention\Image\ImageManagerStatic as Image;

class Movie extends Model
{
    protected $table = "movies";

    protected $fillable = ['usuario_id','asignatura_id','name','observation','language','creation_date','description','imageRef','advertisingImage','url','state','production_year','category','category2','shooting_format','direction','direction_assistant','casting','continuista','script','production','production_assistant','photografic_direction','camara','camara_assistant','art_direction','sonorous_register','mounting','image_postproduction','sound_postproduction','catering','music','actors','other1Name','other1Content','other2Name','other2Content','other3Name','other3Content'];

    public function setImageRefAttribute($imageRef){
        $this->attributes['imageRef'] = Carbon::now()->second.$imageRef->getClientOriginalName();
        $name = Carbon::now()->second.$imageRef->getClientOriginalName();
        \Storage::disk('local')->put($name, \File::get($imageRef));
        //$this->attributes['imageRef'] = Carbon::now()->second.$imageRef;
        //$newName = $this->attributes['imageRef'];
       /* $name = Carbon::now()->second.$imageRef->getClientOriginalName(); 
        \Storage::disk('local')->put($name, \File::get($imageRef));*/

        $img = Image::make('files/'.$name)->resize(200, 200);
        $img->save();
        //echo "resize";
    }
    public function setAdvertisingImageAttribute($advertisingImage){
        $this->attributes['advertisingImage'] = Carbon::now()->second.$advertisingImage->getClientOriginalName();
        $name = Carbon::now()->second.$advertisingImage->getClientOriginalName();
        \Storage::disk('local')->put($name, \File::get($advertisingImage));
        
        $img = Image::make('files/'.$name)->resize(1080, 600);
        $img->save();
    }
    public function setUrlAttribute($url){
        
        /*$this->attributes['url'] = 'old/'.Carbon::now()->second.$url->getClientOriginalName();
        $name = Carbon::now()->second.$url->getClientOriginalName();
        \Storage::disk('local')->put($name, \File::get($url));*/
        $firstUrl = $url;

        $file = Carbon::now()->second.pathinfo($url,PATHINFO_FILENAME); 
        $extension = pathinfo($url,PATHINFO_EXTENSION);

        //Para CentOS
        /*$ffmpeg = \FFMpeg\FFMpeg::create([
            'ffmpeg.binaries'  => '/usr/local/bin/ffmpeg/ffmpeg',
            'ffprobe.binaries' => '/usr/local/bin/ffprobe',
            'timeout'          => 0, // The timeout for the underlying process
            'ffmpeg.threads'   => 12,   // The number of threads that FFMpeg should use

        ]);*/
        //Para OSX
        $ffmpeg = \FFMpeg\FFMpeg::create([
            'ffmpeg.binaries'  => '/Applications/MAMP/htdocs/FFmpeg/ffmpeg',
            'ffprobe.binaries' => '/Applications/MAMP/htdocs/FFmpeg/ffprobe',
            'timeout'          => 0, // The timeout for the underlying process
            'ffmpeg.threads'   => 12,   // The number of threads that FFMpeg should use

        ]);
        $video = $ffmpeg->open('files/temp/videos/'.$url);
        //$format = new CustomVideo();
        $format = new FFMpeg\Format\Video\X264('libmp3lame', 'libx264');
        /*$format->on('progress', function ($video, $format, $percentage) {
            echo "$percentage % transcoded";
        });*/
        $format
        -> setKiloBitrate(1000)
        -> setAudioChannels(2)
        -> setAudioKiloBitrate(256);

        $video
        ->save($format, 'files/convert/videos/'.$file.'.mp4');
        $this->attributes['url'] = $file.'.mp4';

        //Para CentOS
        //$ffmpeg_path = '/usr/local/bin/ffmpeg/ffmpeg'; //Path to your FFMPEG

        //Para OSX
        $ffmpeg_path = '/Applications/MAMP/htdocs/FFmpeg/ffmpeg'; //Path to your FFMPEG

        $video_path = 'files/convert/videos/'.$file.'.mp4'; // Path to your Video
 
        $command = $ffmpeg_path . ' -i "' . $video_path . '" -vstats 2>&1';
 
        $output = shell_exec($command);
        $regex_duration = "/Duration: ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2}).([0-9]{1,2})/";
        $hours = 0;
        if (preg_match($regex_duration, $output, $regs)) {
            $hours = $regs [1] ? $regs [1] : null;
            $mins = $regs [2] ? $regs [2] : null;
            $secs = $regs [3] ? $regs [3] : null;
            $video_Length = $hours . ":" . $mins . ":" . $secs;
            $this->attributes['duration'] = $video_Length;
        }

        unlink('files/temp/videos/'.$firstUrl);
        
        /*->save(new FFMpeg\Format\Video\X264(), 'export-x264.mp4')
        ->save(new FFMpeg\Format\Video\WMV(), 'export-wmv.wmv')
        ->save(new FFMpeg\Format\Video\WebM(), 'export-webm.webm');*/

        //audio
        /*$ffmpeg = FFMpeg\FFMpeg::create();
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

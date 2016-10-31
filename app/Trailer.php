<?php

namespace contenidoAudiovisual;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;
use FFMpeg;

class Trailer extends Model
{
    protected $table = "trailers";

    protected $fillable = ['video_id','url','duration'];

    public function setUrlAttribute($trailer){

        $this->attributes['url'] = Carbon::now()->second.$trailer->getClientOriginalName();
        $name = Carbon::now()->second.$trailer->getClientOriginalName(); 
        \Storage::disk('local')->put($name, \File::get($trailer));

        $file = pathinfo($name,PATHINFO_FILENAME); 
        $extension = pathinfo($name,PATHINFO_EXTENSION);

        //linux
        /*$ffmpeg = \FFMpeg\FFMpeg::create([
            'ffmpeg.binaries'  => '/usr/local/bin/ffmpeg/ffmpeg',
            'ffprobe.binaries' => '/usr/local/bin/ffprobe',
            'timeout'          => 0, // The timeout for the underlying process
            'ffmpeg.threads'   => 12,   // The number of threads that FFMpeg should use

        ]);*/

        //mac
        $ffmpeg = \FFMpeg\FFMpeg::create([
            'ffmpeg.binaries'  => '/Applications/MAMP/htdocs/FFmpeg/ffmpeg',
            'ffprobe.binaries' => '/Applications/MAMP/htdocs/FFmpeg/ffprobe',
            'timeout'          => 0, // The timeout for the underlying process
            'ffmpeg.threads'   => 12,   // The number of threads that FFMpeg should use

        ]);
        $video = $ffmpeg->open($trailer);

        $format = new FFMpeg\Format\Video\X264('libmp3lame', 'libx264');
        $format->on('progress', function ($video, $format, $percentage) {
            echo "$percentage % transcoded";
        });
        $format
        -> setKiloBitrate(1000)
        -> setAudioChannels(2)
        -> setAudioKiloBitrate(256);

        $video
        ->save($format, 'files/convert/trailers/'.$file.'.mp4');
        $this->attributes['url'] = $file.'.mp4';

        //linux
        //$ffmpeg_path = '/usr/local/bin/ffmpeg/ffmpeg'; //Path to your FFMPEG

        //mac
        $ffmpeg_path = '/Applications/MAMP/htdocs/FFmpeg/ffmpeg'; //Path to your FFMPEG
        $video_path = 'files/convert/trailers/'.$file.'.mp4'; // Path to your Video
 
        $command = $ffmpeg_path . ' -i "' . $video_path . '" -vstats 2>&1';
 
        $output = shell_exec($command);
        $regex_duration = "/Duration: ([0-9]{1,2}):([0-9]{1,2}):([0-9]{1,2}).([0-9]{1,2})/";
        if (preg_match($regex_duration, $output, $regs)) {
        $hours = $regs [1] ? $regs [1] : null;
        $mins = $regs [2] ? $regs [2] : null;
        $secs = $regs [3] ? $regs [3] : null;
        }
         
        $video_Length = $hours . ":" . $mins . ":" . $secs;

        $this->attributes['duration'] = $video_Length;
    }
}
